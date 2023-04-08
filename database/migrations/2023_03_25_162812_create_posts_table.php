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
            $table->string('name')->nullable()->default('texto');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('description')->nullable();
            $table->enum('state', ['post', 'no_post'])->default('no_post');
            $table->timestamps();
            
            //Referencia de la clave foranea
            $table->foreign('category_id')->references('id')->on('categories');
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
