<?php

namespace Database\Seeders;

use App\Models\CoinManagment;
use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CoinManagment::create([
            'true_answer' => 0,
            'false_answer' => 0,
            'max_coin' => 0,
            'min_coin' => 0,
        ]);
    }
}
