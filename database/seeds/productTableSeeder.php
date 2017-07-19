<?php

use Illuminate\Database\Seeder;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
           $creator = DB::table('persons')->pluck('id');
          foreach ($creator as $id)
           {
              
        factory(App\product::class)->create();
          }
    }
    }

