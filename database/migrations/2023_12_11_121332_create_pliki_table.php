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
        Schema::create('pliki', function (Blueprint $table) {
            $table->id();
            $table->text('plik');
            $table->text('nazwa');
            $table->enum('typ', ['pdf', 'word', 'inny'])->default('pdf');
            $table->enum('rodzaj', ['zasob', 'dokument', 'modlitwa','ksiazka', 'skan', 'inny'])->default('dokument');
            $table->text('opis')->nullable();
            $table->tinyText('zdjecie1')->nullable();
            $table->tinyText('zdjecie2')->nullable();
            $table->text('zdjecie1_podpis')->nullable();
            $table->text('zdjecie2_podpis')->nullable();
            $table->bigInteger('zdjecie1_id')->nullable();
            $table->bigInteger('zdjecie2_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pliki');
    }
};
