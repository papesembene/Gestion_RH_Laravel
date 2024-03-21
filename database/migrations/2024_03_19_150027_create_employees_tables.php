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
            $table->string('email')->unique();
            $table->string('adresse');
            $table->string('phone');
            $table->string('datenaiss');
            $table->string('lieunaiss');
            $table->string('dateembauche');
            $table->string('type');
            $table->string('nationalite');
            $table->foreignId('poste_id')->constrained('postes')->cascadeOnDelete();
            $table->foreignId('dept_id')->constrained('departements')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
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
