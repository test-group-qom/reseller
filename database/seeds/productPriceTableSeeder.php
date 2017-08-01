<?php

use Illuminate\Database\Seeder;

class productPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
         $product_id = DB::table('product')->pluck('id');
          foreach ($product_id as $id)
           {
              
        factory(App\productPrice::class)->create();
          }
       
    }
}
