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
        Schema::create('statistiques', function (Blueprint $table) {
            $table->id();
            $table->integer('utilisateur_supprimer');
            $table->integer('utilisateur_modifier');
            $table->integer('paiement_supprimer');
            $table->integer('paiement_modifier');
            $table->integer('filiere_supprimer');
            $table->integer('filiere_modifier');
            $table->integer('emploi_supprimer');
            $table->integer('emploi_modifier');
            $table->integer('occupation_supprimer');
            $table->integer('occupation_modifier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiques');
    }
};
