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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('phone');
            $table->string('datenaiss');
            $table->string('lieunaiss');
            $table->string('dateembauche');
            $table->string('type');
            $table->string('nationalite');
            $table->string('CIN');
            $table->string('situation_matrimoniale')->nullable();
            $table->integer('nbrEnfants')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('poste_id')->constrained('postes')->cascadeOnDelete();
            $table->foreignId('team_id')->nullable()->constrained('equipes')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
