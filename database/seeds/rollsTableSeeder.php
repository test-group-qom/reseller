<?php

use Illuminate\Database\Seeder;

class rollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\rolls::class,50)->create()->each(function ($u) {
        $u->persons()->save(factory(App\persons::class)->make());
          
    });
    }
}
