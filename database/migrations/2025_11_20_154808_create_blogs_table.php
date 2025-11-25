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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
             $table->string('title'); // Blog title

            $table->string('name'); // Author or blog name
             $table->string('category'); // Blog title
            $table->text('description')->nullable(); // Short description
            $table->text('content'); // Full content
            $table->string('image')->nullable(); // Blog image path
            $table->foreignId('blog_category_id')->constrained()->onDelete('cascade'); // Category relation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
