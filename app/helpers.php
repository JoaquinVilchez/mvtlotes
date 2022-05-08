<?php

use App\Events\Ultimos5;
use App\Models\Lot;
use Illuminate\Support\Facades\DB;

function translate($text)
{
    switch ($text) {
        case 'headline':
            return 'titular';
            break;
        case 'alternate':
            return 'suplente';
            break;
    }
}


function updateOutputData($group, $lottery_type, $winner_type, $isNew)
{
    $results = DB::table('results')
        ->join('persons', 'results.person_id', '=', 'persons.id')
        ->leftjoin('lots', 'results.lot_id', '=', 'lots.id')
        ->where('persons.group', $group)
        ->where('results.winner_type', $winner_type)
        ->where('results.lottery_type', $lottery_type)
        ->orderBy('results.created_at', 'desc')->take(3)->get();

    $lots = Lot::where('group', $group)->where('lottery_type', $lottery_type)->get() ;
    if ($lots->count() > 0) {
        $nextLot = $lots->filter(function ($value, $key) {
            if (!$value->result) {
                return $value;
            }
        })->first();
    }

    $results = array($results);
    event(new Ultimos5($results, $nextLot, $group, $winner_type, $lottery_type, $isNew));
}
