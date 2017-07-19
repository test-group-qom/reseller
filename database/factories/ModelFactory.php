<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\persons::class, function (Faker\Generator $faker) {
    
    return [
        'name' => $faker->name,
        'username' => $faker->name,
        'mobile' => $faker->phoneNumber ,
        'token' => str_random(10),
        'bank_card'=>$faker->phoneNumber ,
        'telegram_id'=>$faker->name,
        'password'=>bcrypt(str_random(10)),
        'remember_token'=>str_random(10),
        'profile'=>'{"a":"'.$faker->word.'"}',
        'status'=>0,
    ];
});
$factory->define(App\rolls::class, function (Faker\Generator $faker) {
  
   $a=array("admin","reseller","costumer");
   $random_keys=array_rand($a);   
    return [
        
        'type' =>$a[$random_keys] ,
        'person_id' =>rand(1,50),
        'details' => '{"b":"'.$faker->word.'"}',

        ];
});

$factory->define(App\product::class, function (Faker\Generator $faker) {
  
    return [
        'name' => $faker->name,
        'creator' =>rand(1,50),
        'description'=>$faker->word,
        'details' => '{"b":"'.$faker->word.'"}',

        ];
});