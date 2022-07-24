<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterRelationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_relation_types', function (Blueprint $table) {
            $table->unsignedBigInteger('filter_id')->nullable();
            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
            $table->integer('filter_type_id')->nullable();
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
        Schema::dropIfExists('filter_relation_types');
    }
}
