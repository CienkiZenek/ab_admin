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
        Schema::create('wiadomosci', function (Blueprint $table) {
            $table->id();
            $table->text('tytul');
            $table->text('slug');
            $table->enum('rodzaj', ['Wiadomosc', 'PortalDzialalnosc', 'PortalPublikacjeInych', 'Inna', 'Ogloszenie', 'Wydarzenie'])->default('Wiadomosc');
            $table->date('data')->nullable();
            $table->text('naglowek')->nullable();
            $table->text('tresc')->nullable();
            $table->text('autor')->nullable();
            $table->string('gatunek')->default('wiadomosc'); //gatunek/rodaj tresci - artykuł, wiadomośąc, zasoby, film, modlitwa itp.
            $table->text('zrodlo')->nullable();
            $table->enum('status', ['Robocza', 'Opublikowana', 'Zawieszona', 'Archiwum'])->default('Robocza');
            $table->enum('strona_glowna', ['tak', 'nie'])->default('nie'); // Do  slidera
            $table->tinyText('zdjecie_karuzela')->nullable();
            $table->text('zdjecie_karuzela_podpis')->nullable();
            $table->bigInteger('zdjecie_karuzela_id')->nullable();
            $table->text('galeria_nazwa')->nullable();
            $table->enum('przyklejona', ['tak', 'nie'])->default('nie');
            $table->text('link_tresc')->nullable();
            $table->text('link_url')->nullable();
            $table->enum('link_nofollow', ['tak', 'nie'])->default('nie');
            $table->tinyText('zdjecie1')->nullable();
            $table->tinyText('zdjecie2')->nullable();
            $table->text('zdjecie1_podpis')->nullable();
            $table->text('zdjecie2_podpis')->nullable();
            $table->integer('zdjecie1_id')->nullable();
            $table->integer('zdjecie2_id')->nullable();
            $table->text('ramka1')->nullable();
            $table->text('ramka2')->nullable();
            $table->text('komentarz')->nullable();
            $table->text('cytat1')->nullable();
            $table->text('cytat2')->nullable();
            $table->text('cytat3')->nullable();
            $table->text('cytat4')->nullable();
            $table->text('film')->nullable();
            $table->text('film_podpis')->nullable();
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
        Schema::dropIfExists('wiadomosci');
    }
};
