<?php

namespace App\Http\Controllers;

use App\Events\PlacaGeneral;
use App\Events\ProximoSorteo;
use App\Models\Lot;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function placaGeneral()
    {
        event(new PlacaGeneral());
    }

    public function proximoSorteo()
    {
        $lot = Lot::find(3);
        event(new ProximoSorteo($lot));
    }
}
