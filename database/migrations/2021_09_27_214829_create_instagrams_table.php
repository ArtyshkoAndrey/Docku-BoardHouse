<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramsTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up ()
  {
    Schema::create('instagrams', function (Blueprint $table) {
      $table->id();
      $table->text('key');
      $table->json('posts')->nullable();
      $table->date('key_update');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down ()
  {
    Schema::dropIfExists('instagrams');
  }
}
