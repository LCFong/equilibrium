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
        Schema::create('treatment_evaluation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treatment_id');
            $table->foreignId('evaluation_id');
            $table->date('date');
            $table->boolean('is_submitted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_evaluation');
    }
};
