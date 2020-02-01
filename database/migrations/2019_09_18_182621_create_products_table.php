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
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('category_id')->unsigned();
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('sell_price');
            $table->integer('pack_size');
            $table->bigInteger('brand_id')->unsigned();
            // $table->foreign('brand_id')->references('id')->on('brands');
            $table->integer('alert_quantity')->default(5);
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
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
