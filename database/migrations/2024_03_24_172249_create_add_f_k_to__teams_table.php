<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->foreign('leader_id')->references('id')->on('employees');
            $table->foreign('supervisor_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->dropForeign(['leader_id']);
            $table->dropForeign(['supervisor_id']);
            $table->dropColumn('leader_id');
            $table->dropColumn('supervisor_id');
        });
    }
};
