<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lot;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 112; $i++) {
            $denomination = strval('Nombre lote ' . $i);
            if ($i <= 37) {
                $group = 1;
                $lottery_type = 'cpd';
                if ($i > 1) {
                    $lottery_type = 'general';
                }
            } elseif ($i > 37 && $i <= 84) {
                $group = 2;
                $lottery_type = 'cpd';
                if ($i > 38) {
                    $lottery_type = 'general';
                }
            } elseif ($i > 84 && $i <= 111) {
                $group = 3;
                $lottery_type = 'cpd';
                if ($i > 87) {
                    $lottery_type = 'general';
                }
            }

            // dump($i, $group, $lottery_type);

            Lot::create([
                'group' => $group,
                'lottery_type' => $lottery_type,
                'denomination' => $denomination
            ]);
        }
    }
}
