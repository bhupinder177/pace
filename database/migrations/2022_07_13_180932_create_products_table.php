<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('filter_type_id')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('main_image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('product_features')->nullable();
            $table->longText('product_long_description')->nullable();
            $table->integer('display_order')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('type', ['0','1'])->default('0')->comment("1 = Active, 0 = In-Acive");
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
        Schema::dropIfExists('products');
    }
}
