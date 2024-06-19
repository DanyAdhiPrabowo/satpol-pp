<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

  public function run() {
    $email = 'danyadhi4149@gmail.com';
    $admin = User::where('email', $email)
                  ->first();
    if ($admin !== null) {
      $this->command->info("Data admin sudah ada.");
      return;
    }

    $data = [
      'name' => 'Dany Adhi',
      'email' => $email,
      'scope' => 'admin',
      'password' => Hash::make('admin'),
    ];

    User::insert($data);
    $this->command->info("Data admin berhasil disimpan.");
  }
}
