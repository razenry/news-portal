<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->text('description');
            $table->string('image')->nullable();

            // Foreign keys
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('unit_id')->nullable()->constrained()->onDelete('set null'); 
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Relasi ke categories

            $table->json('tags')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
