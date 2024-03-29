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
        Schema::create('abscences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->references('id')->cascadeOnDelete();
            $table->string('motif');
            $table->string('datedebut');
            $table->string('datefin');
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abscences');
    }
};
