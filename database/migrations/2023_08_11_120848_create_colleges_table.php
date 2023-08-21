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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('principal_name');
            $table->string('name');
            $table->string('description');
            $table->string('code')->unique();
            $table->json('streams');
            $table->string('addresss');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('banner_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
