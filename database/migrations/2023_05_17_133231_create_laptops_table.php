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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->foreignId('idmarque')->constrained('marques');
            $table->foreignId('idprocesseur')->constrained('processeurs');
            $table->foreignId('idram')->constrained('rams');
            $table->foreignId('idecran')->constrained('ecrans');
            $table->foreignId('iddisquedur')->constrained('disquedurs');
            $table->double('prix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
