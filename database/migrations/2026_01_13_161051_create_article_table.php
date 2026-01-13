<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id');
            $table->foreignId('author_id')->unique()->constrained(table: 'authors', column: 'author_id')->onDelete('cascade');
            $table->string('title', 255);
            $table->string('cover_image')->nullable();
            $table->enum('Category', ['Technology', 'Sports', 'Politics', 'Entertainment']); // Add more categories as needed
            $table->text('content');
            $table->enum('status', ['Pending', 'Published'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
