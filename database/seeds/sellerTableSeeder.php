<?php

use Illuminate\Database\Seeder;

class sellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('seller')->insert ([
        //      'name'=>str_random(10),
        //      'username'=>str_random(10),
        //      'token'=>'eqwerfs',
        //      'mobile' => '12',
        //      'bank_card'=>'13',
        //      'status'=>'0'
        //      ]);
        factory(App\seller::class,50)->create();
    }
}
