<?php

use App\Models\Athlete;
use App\Models\Sport;
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
        Schema::create('classement', function (Blueprint $table) {
            $table->foreignIdFor(Sport::class)->on('sports')
                ->onDelete('cascade');
            $table->foreignIdFor(Athlete::class)->on('athletes')
                ->onDelete('cascade');
            $table->integer('rang');
            $table->string('performance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classement');
    }
};
