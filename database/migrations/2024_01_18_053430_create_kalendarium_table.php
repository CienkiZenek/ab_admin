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
        Schema::create('kalendarium', function (Blueprint $table) {
            $table->id();
            $table->text('tytul');
            $table->date('data');
            $table->text('slug');
            $table->string('gatunek')->default('kalendarium'); //gatunek/rodaj tresci - artykuł, wiadomośąc, zasoby, film, modlitwa itp.
            $table->smallInteger('dzien')->nullable();
            $table->smallInteger('mies')->nullable();
            $table->text('mies_tekst')->nullable();
            $table->integer('rok')->nullable();
            $table->enum('status', ['Robocze', 'Opublikowane'])->default('Robocze');
            $table->text('naglowek')->nullable();
            $table->text('tresc')->nullable();
            $table->text('wiecej');
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
        Schema::dropIfExists('kalendarium');
    }
};
