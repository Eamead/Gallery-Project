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
        Schema::create('photo_tags', function (Blueprint $table) {
            $table->unsignedInteger('photo_id');
            $table->unsignedInteger('tag_id');

            // Primary Key
            $table->primary(['photo_id', 'tag_id']);

            // Indexes
            $table->index('tag_id');

            // Foreign Keys
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_tags');
    }
};
