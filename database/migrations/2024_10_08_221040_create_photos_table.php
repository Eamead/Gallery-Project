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
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->timestamp('upload_date')->useCurrent();
            $table->string('estimated_date', 100)->nullable();
            $table->string('estimated_location', 255)->nullable();
            $table->enum('privacy_setting', ['public', 'private'])->default('public');
            $table->unsignedInteger('gallery_id');
            $table->boolean('is_featured')->default(false);
            $table->text('additional_info')->nullable();
            $table->string('copyright_info', 255)->nullable();
            $table->timestamps();

            // Indexes
            $table->index('user_id');
            $table->index('gallery_id');

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
