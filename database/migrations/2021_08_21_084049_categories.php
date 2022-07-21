<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categories', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->integer('category_type')->nullable();
          $table->string('thumbnail_image')->nullable();
          $table->string('banner_image')->nullable();
          $table->integer('displayOrder')->nullable();
          $table->text('description')->nullable();
          $table->string('meta_title')->nullable();
          $table->text('meta_description')->nullable();
          $table->text('meta_keyword')->nullable();
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
          Schema::dropIfExists('categories');
    }
}
