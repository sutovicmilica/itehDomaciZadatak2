<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('tipovi')->truncate();

        $faker = \Faker\Factory::create();

        DB::table('tipovi')->insert([
            'tip' => 'Muska kolekcija',
        ]);

        DB::table('tipovi')->insert([
            'tip' => 'Zenska kolekcija',
        ]);
    }
}
