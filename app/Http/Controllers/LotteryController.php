<?php

namespace App\Http\Controllers;

use App\Events\Ultimos5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\Result;
use App\Models\Lot;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = Result::orderBy('id', 'desc')->take(5)->get();

        return view('controlpanel.lottery')->with([
            'pagename' => 'Sorteos',
            'results' => $results
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // VALIDAR QUE SI YA SE ASIGNO UNA PERSONA TITULAR A UN LOTE, NO SE PUEDE VOLVER A ASIGNAR AL MISMO. EL LOTE ASIGNADO DEBE APARECER COMO DISABLED EN EL SELECT
        if ($request->winner_type == 'headline') {
            $lotValidation = 'required';
        } elseif ($request->winner_type == 'alternate') {
            $lotValidation = 'nullable';
        }

        $request->validate([
            'group' => 'required',
            'lottery_type' => 'required',
            'winner_type' => 'required',
            'lot' => $lotValidation,
            'person' => 'required',
        ]);

        $validationData = [
            'cpd' => [
                1 => [
                    'headline' => 1,
                    'alternate' => 2
                ],
                2 => [
                    'headline' => 1,
                    'alternate' => 2
                ],
                3 => [
                    'headline' => 3,
                    'alternate' => 6
                ],
            ],
            'general' => [
                1 => [
                    'headline' => 36,
                    'alternate' => 72
                ],
                2 => [
                    'headline' => 46,
                    'alternate' => 92
                ],
                3 => [
                    'headline' => 24,
                    'alternate' => 48
                ],
            ]
        ];

        $headlines = DB::table('results')
            ->join('persons', 'results.person_id', '=', 'persons.id')
            ->where('persons.group', $request->group)
            ->where('results.winner_type', 'headline')
            ->where('results.lottery_type', $request->lottery_type)
            ->count();

        $alternates = DB::table('results')
            ->join('persons', 'results.person_id', '=', 'persons.id')
            ->where('persons.group', $request->group)
            ->where('results.winner_type', 'alternate')
            ->where('results.lottery_type', $request->lottery_type)
            ->count();

        $validation = $validationData[$request->lottery_type][$request->group][$request->winner_type];


        if ($request->winner_type == 'headline') {
            $result = Result::where('lot_id', $request->lot)->where('winner_type', 'headline')->get();
            if ($result->isEmpty()) {
                if ($headlines < $validation) {
                    $response = true;
                    $lot_id = $request->lot;
                    $order_number = null;
                } else {
                    $response = false;
                }
            } else {
                $response = false;
            }
        } elseif ($request->winner_type == 'alternate') {
            if ($alternates < $validation) {
                $response = true;
                $lot_id = null;

                $last_order_number = DB::table('results')
                    ->join('persons', 'results.person_id', '=', 'persons.id')
                    ->where('persons.group', $request->group)
                    ->where('results.winner_type', 'alternate')
                    ->where('results.lottery_type', $request->lottery_type)
                    ->orderBy('results.created_at', 'desc')->first('order_number');

                if ($last_order_number != null) {
                    $last_order_number = $last_order_number->order_number;
                } else {
                    $last_order_number = 0;
                }

                $order_number = $last_order_number + 1;
            } else {
                $response = false;
            }
        }

        if ($response) {
            Result::create([
                'person_id' => $request->person,
                'order_number' => $order_number,
                'lot_id' => $lot_id,
                'lottery_type' => $request->lottery_type,
                'winner_type' => $request->winner_type,
            ]);

            updateOutputData($request->group, $request->lottery_type, $request->winner_type);

            return redirect()->route('lottery.create')->with('success_message', 'Sorteo registrado con éxito');
        } else {
            return redirect()->route('lottery.create')->with('error_message', 'Ya no se puede registrar mas un ' . translate($request->winner_type));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $results = Result::all();
        return view('controlpanel.results')->with([
            'pagename' => 'Resultados',
            'results' => $results
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $result = Result::find($request->resultid);
            $result->delete();

            return redirect()->route('lottery.show')->with('success_message', 'Resultado eliminado con éxito');
        } catch (\Throwable $th) {
            return redirect()->route('lottery.show')->with('error_message', 'El resultado no se pudo eliminar');
        }
    }

    public function getLots(Request $request)
    {
        $lots = Lot::where('group', $request->group)->where('lottery_type', $request->lottery_type)->get();

        $lots = $lots->filter(function ($value, $key) {
            if (!$value->result) {
                return $value;
            }
        });

        return response()->json($lots);
    }

    public function getPersons(Request $request)
    {

        if ($request->lottery_type == 'general') {
            $persons = Person::where('group', $request->group)->get();
            $persons = $persons->filter(function ($value, $key) {
                if (!$value->result || $value->result->winner_type == 'alternate') {
                    return $value;
                }
            });
        } elseif ($request->lottery_type == 'cpd') {
            $persons = Person::where('group', $request->group)->where('type', $request->lottery_type)->get();
            $persons = $persons->filter(function ($value, $key) {
                if (!$value->result) {
                    return $value;
                }
            });
        }

        return response()->json($persons);
    }
}
