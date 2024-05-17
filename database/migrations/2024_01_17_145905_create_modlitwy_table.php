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
        Schema::create('modlitwy', function (Blueprint $table) {
            $table->id();
            $table->text('nazwa');
            $table->text('tresc')->nullable();
            $table->text('tresc_wyszukiwarka')->nullable();// gdy jest załączony plik, to tu dajemy treść dla wyszukiwarki
            $table->text('slug');
            $table->text('opis')->nullable();
            $table->string('gatunek', 10)->default('modlitwa'); //gatunek/rodaj tresci - artykuł, wiadomośąc, zasoby, film, modlitwa itp.
            $table->string('widok',40)->nullable();
            $table->enum('strona_glowna', ['tak', 'nie'])->default('nie'); //karuzela; slider
            $table->text('zrodlo_nazwa')->nullable();
            $table->text('zrodlo_link')->nullable();
            $table->enum('link_nofollow', ['tak', 'nie'])->default('nie');
            $table->tinyText('zdjecie1')->nullable();
            $table->tinyText('zdjecie2')->nullable();
            $table->text('zdjecie1_podpis')->nullable();
            $table->text('zdjecie2_podpis')->nullable();
            $table->bigInteger('zdjecie1_id')->nullable();
            $table->bigInteger('zdjecie2_id')->nullable();
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
        Schema::dropIfExists('modlitwy');
    }
};
