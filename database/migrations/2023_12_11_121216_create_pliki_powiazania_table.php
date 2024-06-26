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
        Schema::create('pliki_powiazania', function (Blueprint $table) {
            $table->id();
            $table->string('powiazPliki_type', 30); // nazwa klasy powiązywanej
            $table->smallInteger('pliki_id'); // id pliku
            $table->smallInteger('powiazPliki_id'); //  (nazwa musi się zgadazać z "nazwa_type" -> zdefinowana w modelu nazwa!!) id powiązania - id wiadomości, artykułu, biografi itp...
            $table->unique(['powiazPliki_type','pliki_id','powiazPliki_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pliki_powiazania');
    }
};
