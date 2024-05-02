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
        Schema::create('zasoby', function (Blueprint $table) {
            $table->id();
            $table->text('nazwa');
            $table->text('opis')->nullable();
            $table->text('tresc')->nullable();
            $table->text('slug');
            $table->string('gatunek')->default('zasob'); //gatunek/rodaj tresci - artykuł, wiadomośąc, zasoby, film, modlitwa itp.
            $table->enum('rodzaj', ['ksiazka', 'galeria', 'modlitwa', 'dokument', 'publikacja', 'wydarzenie', 'inny' ])->default('galeria');
            $table->enum('strona_glowna', ['tak', 'nie'])->default('nie'); //karuzela; slider
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
        Schema::dropIfExists('zasoby');
    }
};
