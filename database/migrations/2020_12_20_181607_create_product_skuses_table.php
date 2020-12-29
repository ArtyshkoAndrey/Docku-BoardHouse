<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSkusesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_skuses', function (Blueprint $table) {
      $table->id();
      $table->integer('stock');
      $table->foreignId('product_id')->constrained('products');
      $table->foreignId('skus_id')->constrained('skuses');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_skuses');
  }
}
