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
       Schema::create('program', function(Blueprint $table){
           $table->id();
           $table->foreignId('user_id')->constrained('users')->nullOnDelete();
           $table->integer('category');
           $table->integer('move');
           $table->integer('move_amount');
           $table->integer('set_amount');
           $table->integer('number_of_program');
           $table->timestamps();
       });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
       Schema::dropIfExists('program');
   }
};
