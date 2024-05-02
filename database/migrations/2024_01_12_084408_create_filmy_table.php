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
        Schema::create('filmy', function (Blueprint $table) {
            $table->id();
            $table->text('tytul');
            $table->text('slug');
            $table->text('opis')->nullable();
            $table->text('film_kod')->nullable();
            $table->string('kanal')->nullable();
            $table->string('kanal_url')->nullable();
            $table->string('gatunek')->default('film'); //gatunek/rodaj tresci - artykuł, wiadomośąc, zasoby, film, modlitwa itp.
            $table->enum('rodzaj', ['Wlasny', 'Obcy'])->default('Obcy');
            $table->text('title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmy');
    }
};
