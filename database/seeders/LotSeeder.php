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
        for ($i = 1; $i < 48; $i++) {
            $group = 1;
            if ($i >= 10 && $i < 20) {
                $group = 2;
            } elseif ($i >= 20 && $i < 30) {
                $group = 3;
            } elseif ($i >= 30) {
                $group = 4;
            }

            Lot::create([
                'lot_number' => $i,
                'group' => $group
            ]);
        }
    }
}
