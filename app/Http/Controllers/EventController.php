<?php

namespace App\Http\Controllers;

use App\Events\PlacaGeneral;
use App\Events\ProximoSorteo;
use App\Events\Ultimos5;
use App\Models\Result;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function placaGeneral()
    {
        event(new PlacaGeneral());
    }

    public function proximoSorteo(Request $request)
    {
        $lots = Lot::where('group', $request->group)->where('lottery_type', $request->lottery_type)->get();
        if ($lots->count() > 0) {
            $nextLot = $lots->filter(function ($value, $key) {
                if (!$value->result) {
                    return $value;
                }
            })->first();
        }
        
        event(new ProximoSorteo($nextLot));
        
    }

    public function ultimos5Ganadores(Request $request)
    {
        updateOutputData($request->group, $request->lottery_type, $request->winner_type, false);
    }
}
