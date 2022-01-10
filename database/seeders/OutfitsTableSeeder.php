<?php

namespace Database\Seeders;

use App\Models\Odeca;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutfitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Odeca::truncate();

        for ($i = 1; $i < 51; $i++){

            Odeca::create([
                'model' => 'Model ' . $i,
                'opis' => 'Opis ' . $i,
                'tip_id' => rand(1,2)
            ]);

//            DB::table('odeca')->insert([
//                'model' => 'Model ' . $i,
//                'opis' => 'Opis ' . $i,
//                'tip_id' => rand(1,2)
//            ]);
        }
    }
}
