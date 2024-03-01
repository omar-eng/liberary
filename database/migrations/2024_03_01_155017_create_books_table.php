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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('auth_namr')->nullable();
            $table->string('price')->nullable();
            $table->string('describtion')->nullable();
            $table->string('quantity')->nullable();
            $table->string('book_img')->nullable();
            $table->string('auther_img')->nullable();

            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
