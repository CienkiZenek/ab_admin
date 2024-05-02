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
        Schema::create('watki_powiazania', function (Blueprint $table) {
            $table->id();
            $table->string('powiazWatki_type', 30); // nazwa klasy powiązywanej
            $table->smallInteger('watki_id'); // id wątku
            $table->smallInteger('powiazWatki_id'); //  (nazwa musi się zgadazać z "nazwa_type" -> zdefinowana w modelu nazwa!!) id powiązania - id wiadomości, artykułu, biografi itp...
            $table->unique(['powiazWatki_type','watki_id','powiazWatki_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watki_powiazania');
    }
};
