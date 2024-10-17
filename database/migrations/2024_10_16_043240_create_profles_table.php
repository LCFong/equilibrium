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
        Schema::create('profles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('gender',1)->nullable();
            $table->string('dob')->nullable();
            $table->string('school')->nullable();
            $table->string('subject')->nullable();
            $table->char('grade',2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profles');
    }
};
