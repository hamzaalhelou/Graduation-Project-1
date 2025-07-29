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
            $table->id();
            $table->date('date');
            $table->string('title');
            $table->string('image');
            $table->string('category');
            $table->string('field');
            $table->double('price');
            $table->string('duration_hours');
            $table->string('duration');
            $table->string('duration_month');
            $table->text('content');
            $table->foreignId('teacher_id');
            $table->timestamps();
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
