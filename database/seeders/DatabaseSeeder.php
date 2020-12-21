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

    DB::table('brands')->insert([
      'name'        => 'Nike',
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);

    DB::table('brands')->insert([
      'name'        => 'Adidas',
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    $this->command->info('Brands table seeded!');

    DB::table('categories')->insert([
      'name'        => 'Сноуборды',
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);

    DB::table('categories')->insert([
      'name'        => 'Крепления для сноуборда',
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);

    DB::table('categories_categories')->insert([
      'category_id'  => 1,
      'child_category_id'  => 2,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    $this->command->info('Categories table seeded!');

    DB::table('skus_categories')->insert([
      'name'  => 'Сноуборды',
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    DB::table('skus_categories')->insert([
      'name'  => 'Дети',
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    $this->command->info('Skus Categories table seeded!');

    DB::table('skuses')->insert([
      'title'  => '180',
      'weight' => '1',
      'skus_category_id' => 1,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    DB::table('skuses')->insert([
      'title'  => '160',
      'weight' => '2',
      'skus_category_id' => 1,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    DB::table('skuses')->insert([
      'title'  => '36',
      'weight' => '2',
      'skus_category_id' => 2,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    DB::table('skuses')->insert([
      'title'  => '38',
      'weight' => '1',
      'skus_category_id' => 2,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    $this->command->info('Skuses table seeded!');

    DB::table('products')->insert([
      'title'  => 'Товар 1',
      'description' => 'Это товар',
      'on_sale' => false,
      'on_new' => false,
      'on_top' => false,
      'sold_count' => 0,
      'price' => 10000,
      'price_sale' => null,
      'weight' => 1,
      'meta' => '[{"title": "Товар","description": "Официальный разработчик "}]',
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    $this->command->info('Product table seeded!');

    DB::table('product_skuses')->insert([
      'stock'  => 10,
      'product_id' => 1,
      'skus_id' => 1,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    DB::table('product_skuses')->insert([
      'stock'  => 100,
      'product_id' => 1,
      'skus_id' => 2,
      'created_at'  => now(),
      'updated_at'  => now(),
    ]);
    $this->command->info('Product table seeded!');
  }
}
