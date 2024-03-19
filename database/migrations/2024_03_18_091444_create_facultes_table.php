<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Faculte;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facultes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('alias');
            $table->timestamps();
        
        });
        Schema::table('superviseurs',function(Blueprint $table){
            $table->foreignIdFor(Faculte::class)->constrained()->restrictOnDelete();
        });
        Schema::table('promotions',function(Blueprint $table){
            $table->foreignIdFor(Faculte::class)->constrained()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultes');
    }
};
