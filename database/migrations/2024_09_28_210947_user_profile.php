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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('weight');
            $table->string('height');
            $table->string('age');
            $table->string('gender');
            $table->string('activity_level');
            $table->string('diet_type');
            $table->string('diet_type2');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profile');
    }

};
