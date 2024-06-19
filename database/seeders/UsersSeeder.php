<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $password = \Hash::make("password");

      $data = [];
      for ($i=0; $i < 38; $i++) { 
        $firstName = $faker->firstName();
        $lastName = $faker->lastName();
        $data[] = [
          'name'    => $firstName.' '.$lastName,
          'email'   => Str::lower($firstName.$lastName.'@gmail.com'),
          'password'  => $password,
        ];
      }

      User::insert($data);
      $this->command->info("User berhasil diinsert");
    }
}
