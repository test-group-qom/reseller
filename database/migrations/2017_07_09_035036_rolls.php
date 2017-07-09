<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rolls extends Migration
{
    public function up()
    {
         Schema::create('rolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->json('details');
            $table->timestamps();
            $table->softDeletes();
        
        });
    }
 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('rolls');
    }
}
