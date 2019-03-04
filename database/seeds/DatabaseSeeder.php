<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*
        $faker = Faker::create();
    	foreach (range(1,20) as $index) {
	        DB::table('companies')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'website' => $faker->domainName,
            ]);
    } */
     $faker = Faker::create();
    	foreach (range(1,10) as $index) {
            list($first_name,$last_name) = explode(' ',$faker->name);
	        DB::table('employees')->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
	            'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'id_company' => rand(30, 33),
            ]);
            }
    }
}
