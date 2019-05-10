<?php

use Illuminate\Database\Seeder;

class NeighborhoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('neighborhoods')->insert([
            0 => [
                'name' => 'El centro',
                'latitude' => '10.75',
                'longitude' => '-73.58'
            ],
        ]);
    }
}
