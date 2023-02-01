<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            // non-nullable means required
            $table->string('file');
            $table->string('dimension');
            // to store number of times pics are viewed
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('download_count')->default(0);
            // to determine if pics is published
            $table->boolean('is_published')->default(false);
            // relate to user table
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
