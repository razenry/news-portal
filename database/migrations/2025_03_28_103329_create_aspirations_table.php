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
        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->text('body');
            $table->text('description');
            $table->json('tags');
            $table->boolean('published')->default(0);
            $table->enum('type', ['Blog', 'Aspirasi'])->default('Blog');
            $table->integer('views')->nullable()->default(0);
            $table->boolean('comments_enabled')->default(value: true);
            $table->timestamps();
            $table->softDeletes();

            // Relasi
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('unit_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirations');
    }
};
