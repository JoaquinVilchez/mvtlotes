<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::all();
        return view('controlpanel.lots')->with([
            'lots' => $lots,
            'pagename' => 'Lotes'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lot = Lot::find($id);
        return view('controlpanel.editlot')->with([
            'pagename' => 'Editar lote',
            'lot' => $lot
        ]);
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
        try {
            $lot = Lot::find($id);

            if ($request->hasFile('image')) {
                if ($lot->image != 'noimage') {
                    File::delete(public_path('assets/images/lots/' . $lot->image));
                }
                $file = $request->file('image');
                $filename = $lot->denomination[0] . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/lots/'), $filename);

                $lot->update([
                    'group' => $request->group,
                    'image' => $filename
                ]);
            } else {
                $lot->update([
                    'group' => $request->group
                ]);
            }

            return redirect()->route('lot.index')->with('success_message', 'Lote editado con éxito');
        } catch (\Throwable $th) {
            return redirect()->route('lot.index')->with('success_error', 'El lote no se pudo editar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
