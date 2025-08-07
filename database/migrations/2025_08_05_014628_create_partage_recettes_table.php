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
        Schema::create('partage_recettes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('base');
            $table->longText('ingredient');
            $table->longText('etape');
            $table->string('photo');
            $table->string('user_id');
            $table->string('coms')->nullable();
            $table->string('jaime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partage_recettes');
    }
};
