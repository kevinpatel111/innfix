<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();

            // Main category (BLACK)
            $table->unsignedBigInteger('category_name');

            // Self reference (BLUE → GREEN)
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->string('title');
            $table->string('slug')->index();
            $table->text('short_description')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_name')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')
                ->on('subcategories')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
