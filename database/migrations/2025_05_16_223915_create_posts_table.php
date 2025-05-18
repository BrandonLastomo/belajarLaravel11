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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug')->unique();

            // membuat foreign key tanpa membuat index
            // $table->unsignedBigInteger('author_id');
            // $table->foreign('author_id')->references('id')->on('users');

            // membuat foreign key untuk author dengan index
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_user_id'
            );

            // membuat foreign key untuk category dengan index
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'posts_category_id'
            );
            $table->text('body');
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
