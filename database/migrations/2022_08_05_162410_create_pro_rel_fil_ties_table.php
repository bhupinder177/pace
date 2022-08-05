<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProRelFilTiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_rel_fil_ties', function (Blueprint $table) {
            $table->unsignedBigInteger('pro_id')->nullable();
            $table->foreign('pro_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('fil_id')->nullable();
            $table->foreign('fil_id')->references('id')->on('filters');
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
        Schema::dropIfExists('pro_rel_fil_ties');
    }
}
