<?php

namespace Database\Seeders;

use DB;
use Eloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();

//    $this->call('UserTableSeeder');
//    $this->command->info('User table seeded!');

    $path = 'public/sql/countries.sql';
    DB::unprepared(file_get_contents($path));
    $this->command->info('Country table seeded!');

    $path = 'public/sql/cities.sql';
    DB::unprepared(file_get_contents($path));
    $this->command->info('City table seeded!');

    DB::table('users')->insert([
      'name'        => 'Артышко Андрей Алексеевич',
      'email'       => 'artyshko.andrey@gmail.com',
      'password'    => Hash::make('123123'),
      'address'     => 'ул.Горького 24, кв. 25',
      'post_code'   => '660099',
      'country_id'  => 1,
      'city_id'     => 1,
      'avatar'      => null,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    $this->command->info('User table seeded!');
  }
}
