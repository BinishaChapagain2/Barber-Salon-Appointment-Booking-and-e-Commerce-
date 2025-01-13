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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();  // Unique identifier
            $table->string('name');  // Course name/title
            $table->text('description');  // Detailed course description
            $table->integer('price');  // Course price (if applicable)
            $table->integer('discounted_price')->nullable();  // Discounted price (if applicable)
            $table->integer('duration');  // Course duration in hours or days
            $table->string('photopath');
            $table->timestamps();  // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
