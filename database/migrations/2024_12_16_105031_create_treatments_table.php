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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->char('gender',1)->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('school')->nullable();
            $table->string('study_year')->nullable();
            $table->date('date_start');
            $table->date('date_finish')->nullable();
            //$table->boolean('is_finished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
