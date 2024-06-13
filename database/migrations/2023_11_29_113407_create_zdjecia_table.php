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
        Schema::create('zdjecia', function (Blueprint $table) {
            $table->id();
            $table->text('plik');
            $table->text('plik_duze')->nullable();
            $table->text('autor')->nullable();
            $table->tinyText('kategoria')->nullable();
            $table->enum('duze', ['tak', 'nie'])->default('nie');
            $table->text('opis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zdjecia');
    }
};
