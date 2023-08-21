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
        Schema::create('entrance_exams', function (Blueprint $table) {
            $table->id();
            $table->year('admission_year');
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('code')->unique();
            $table->json('courses'); 
            $table->date('exam_date')->nullable();
            $table->date('reg_start_date');
            $table->date('reg_last_date')->nullable();
            $table->string('fee');
            $table->date('result_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrance_exams');
    }
};
