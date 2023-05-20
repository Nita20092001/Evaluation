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
        Schema::create('renvoies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idlaptop')->constrained('laptops');
            $table->integer('quantite');
            $table->foreignId('idpointdevente')->constrained('pointdeventes');
            $table->boolean('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renvoies');
    }
};
