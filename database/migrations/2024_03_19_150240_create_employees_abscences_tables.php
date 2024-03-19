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
        Schema::create('employees_abscences', function (Blueprint $table) {
            $table->id();$table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->foreignId('abscences_id')->constrained('abscences')->cascadeOnDelete();
            $table->string('datedebut');
            $table->string('datefin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_abscences');
    }
};
