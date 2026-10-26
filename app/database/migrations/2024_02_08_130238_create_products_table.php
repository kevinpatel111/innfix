<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Category relation (main / sub / child)
            $table->unsignedBigInteger('category_id');

            // Product core
            $table->string('name');
            $table->string('slug')->unique();

            // Media
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();

            // Extra content
            $table->string('youtube_link')->nullable();
            $table->json('features')->nullable(); // bullet list
            $table->longText('product_descripion')->nullable(); // bullet list

            // Status
            $table->boolean('status')->default(true);

            $table->timestamps();

            // Foreign key
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
