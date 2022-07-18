<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('media', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title')->nullable();
          $table->string('image')->nullable();
          $table->integer('displayOrder')->nullable();
          $table->integer('showOnHome')->nullable();
          $table->enum('type', ['1','2'])->default('1')->comment("1 = media, 2 = inspiration");
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
        Schema::dropIfExists('media');
    }
}
