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
        Schema::create('electeurs', function (Blueprint $table) {
            $table->id();$table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();                      
            $table->string('password'); 
            $table->integer('matricule');       
            $table->string('image')->nullable();
            $table->integer('nbre_voix')->nullable();
            $table->string('description')->nullable();
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electeurs');
    }
};
