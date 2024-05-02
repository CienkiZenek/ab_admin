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
        Schema::create('zdjecia_powiazania', function (Blueprint $table) {
            $table->id();
            $table->string('powiaz_type', 30); // nazwa klasy powiązywanej
            $table->smallInteger('zdjecia_id'); // id zdjęcia
            $table->smallInteger('powiaz_id'); // (nazwa musi się zgadazać z "nazwa_type" -> zdefinowana w modelu nazwa!!) id powiązania - id wiadomości, artykułu, biografi itp...
            $table->enum('rodzaj', ['Zdjecie1', 'Zdjecie2', 'Galeria'])->default('Zdjecie1');
            $table->unique(['powiaz_type','zdjecia_id','powiaz_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zdjecia_powiazania');
    }
};
