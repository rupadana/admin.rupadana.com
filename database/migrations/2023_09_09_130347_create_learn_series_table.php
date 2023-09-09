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
        Schema::create('learn_series', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->boolean('is_new');
            $table->boolean('is_show');
            $table->string('level');
            $table->string('image_id');
            $table->timestamps();

            $table->index('slug', 'slug_index');
        });

        Schema::create('learn_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('category');
            $table->string('language');
            $table->string('difficulty');
            $table->text('content')->nullable();
            $table->string('source')->nullable()->default('');
            $table->string('cover_url')->nullable()->default('');
            $table->string('source_url')->nullable()->default('');
            $table->integer('series_id');
            $table->timestamps();

            $table->index('slug', 'slug_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learn_series');
        Schema::dropIfExists('learn_contents');
    }
};
