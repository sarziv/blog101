<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        // $this->call(UsersTableSeeder::class);

        DB::table('posts')->insert([
            'id'=>str_random(1),
            'user_id'=> str_random(1),
            'title' => $faker->name,
            'body' => $faker->safeEmail,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
