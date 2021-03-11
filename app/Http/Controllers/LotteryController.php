<?php

namespace App\Http\Controllers;

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
        $persons = Person::all();
        $availablePersons = $persons->filter(function ($value, $key) {
            if (!$value->result) {
                return $value;
            }
        });
        $results = Result::all();
        $raffledLots = array();
        foreach ($results as $result) {
            array_push($raffledLots, $result->lot->id);
        }

        return view('controlpanel.lottery')->with([
            'pagename' => 'Sorteos',
            'persons' => $availablePersons,
            'raffledLots' => $raffledLots
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
        Result::create([
            'person_id' => $request->person,
            'lot_id' => $request->lot,
            'type' => 'titular'
        ]);

        return redirect()->route('lottery.create')->with('success_message', 'Sorteo registrado con éxito');
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
}
