<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsUpdateInstagramTable extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up ()
  {
    Schema::table('instagrams', function (Blueprint $table) {
      $table->date('posts_update')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down ()
  {
    Schema::table('instagrams', function (Blueprint $table) {
      $table->removeColumn('posts_update');
    });
  }
}
