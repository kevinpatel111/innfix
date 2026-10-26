<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_name');
            $table->unsignedBigInteger('category_size');
            $table->string('finish');
            $table->tinyInteger('status')->default('0'); 
            $table->timestamps();

            $table->foreign('category_name')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->foreign('category_size')
            ->references('id')->on('subcategories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finishes');
    }
}
