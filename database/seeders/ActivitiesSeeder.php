<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Activity;
use \App\Models\User;
use Faker\Factory as Faker;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $faker = Faker::create();

      // Get all user IDs from the users table
      $userIds = User::where('scope', 'user')
                      ->pluck('id')
                      ->toArray();

      if (empty($userIds)) {
        $this->command->error('No users found in the database. Please seed users first.');
        return;
      }

      $activities = ['Penggusuran', 'Penertipan', 'Patroli', 'pengamanan'];
      $status = ['active', 'done', 'expired'];
      $now = now();

      $data = [];
      for ($i=0; $i < 20; $i++) { 
        $data[] = [
          'name'  => $faker->randomElement($activities),
          'user_id' => $faker->randomElement($userIds),
          'place' => $faker->address(),
          'date' => $faker->dateTimeBetween('now', '+2 month')->format('Y-m-d'),
          'status' => $faker->randomElement($status),
        ];
      }

      Activity::insert($data);
      $this->command->info("Activity berhasil diinsert");
    }
}
