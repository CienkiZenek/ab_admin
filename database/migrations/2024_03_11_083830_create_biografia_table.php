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
        Schema::create('biografia', function (Blueprint $table) {
            $table->id();
            $table->text('tytul');
            $table->text('slug');
            $table->text('naglowek')->nullable();
            $table->text('tresc')->nullable();
            $table->text('autor')->nullable();
            $table->enum('dzial', ['zycie', 'kult', 'patron'])->default('kult');
            $table->text('etap_zycia')->nullable();
            $table->string('gatunek')->default('biografia'); //gatunek/rodaj tresci - artykuł, wiadomośąc, zasoby, film, modlitwa itp.
            $table->enum('status', ['Roboczy', 'Opublikowany'])->default('Roboczy');
            $table->tinyText('zdjecie1')->nullable();
            $table->tinyText('zdjecie2')->nullable();
            $table->text('zdjecie1_podpis')->nullable();
            $table->text('zdjecie2_podpis')->nullable();
            $table->bigInteger('zdjecie1_id')->nullable();
            $table->bigInteger('zdjecie2_id')->nullable();
            $table->text('ramka1')->nullable();
            $table->text('ramka2')->nullable();
            $table->text('cytat1')->nullable();
            $table->text('cytat2')->nullable();
            $table->text('cytat3')->nullable();
            $table->text('cytat4')->nullable();
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
        Schema::dropIfExists('biografia');
    }
};
