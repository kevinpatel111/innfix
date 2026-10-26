<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreadcrumbimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breadcrumbimages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('breadcrumb_name');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default('0'); 
            $table->timestamps();

            $table->foreign('breadcrumb_name')
            ->references('id')->on('breadcrumbpages')
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
        Schema::dropIfExists('breadcrumbimages');
    }
}
