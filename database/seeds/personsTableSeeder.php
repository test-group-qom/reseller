<?php

use Illuminate\Database\Seeder;

class personsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
         factory(App\persons::class,50)->create()->each(function ($u) {
        $u->rolls()->save(factory(App\rolls::class)->make());;
         });
    }
}
