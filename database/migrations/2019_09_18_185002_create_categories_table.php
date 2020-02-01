<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing categories
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            // $table->foreign('parent_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('slug')->unique()->nullable();
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
        Schema::dropIfExists('categories');
    }
}
