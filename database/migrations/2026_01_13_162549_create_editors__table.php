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
        Schema::create('editors', function (Blueprint $table) {
            $table->id('editor_id');
            $table->foreignId('editor_number')->unique()->constrained(table: 'editorsID', column: 'editor_number')->onDelete('cascade');
            $table->string('first_name', 50);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editors_');
    }
};
