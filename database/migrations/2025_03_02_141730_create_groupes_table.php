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
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
        });

        DB::table('groupes')->insert([
            ['nom' => 'Amis'],
            ['nom' => 'Travail'],
            ['nom' => 'Famille'],
            ['nom' => 'Connaissance'],
            ['nom' => 'Camarade'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupes');
    }
};
