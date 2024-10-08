<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('photo_categories', function (Blueprint $table) {
            $table->unsignedInteger('photo_id');
            $table->unsignedInteger('category_id');

            // Primary Key
            $table->primary(['photo_id', 'category_id']);

            // Indexes
            $table->index('category_id');

            // Foreign Keys
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_categories');
    }
};
