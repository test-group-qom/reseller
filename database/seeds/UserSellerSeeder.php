<?php

use Illuminate\Database\Seeder;
use App\seller;
class UsersSellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

     //   $this->command->info('User table seeded!');
         seller::create([
             'name'=>'mohamad',
             'username'=>'mo1',
             'token'=>'eqw',
             'mobile' => '12',
             'bank_card'=>'13',
             'status'=>'0'
             ]);
    }

}



