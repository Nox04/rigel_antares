<?php

use Illuminate\Database\Seeder;

class MessengersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Messenger::class, 50)->create();
    }
}
