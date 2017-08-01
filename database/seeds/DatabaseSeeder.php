<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(personsTableSeeder::class);
    
       $this->call(productPriceTableSeeder::class);   
       $this->call(productTableSeeder::class);   
       
    }
}
