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
        for ($i = 0; $i < 50; $i++) {
            factory(App\Messenger::class, 20)->create();
        }
    }
}
