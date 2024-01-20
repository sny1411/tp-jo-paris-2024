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
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string("nom")->nullable(false);
            $table->string("description")->nullable(false);
            $table->integer("annee_ajout")->nullable(false);
            $table->integer("nb_disciplines");
            $table->integer("nb_epreuves");
            $table->datetime("date_debut");
            $table->datetime("date_fin");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sports');
    }
};
