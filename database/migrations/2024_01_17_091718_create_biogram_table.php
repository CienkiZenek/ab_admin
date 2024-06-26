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
        Schema::create('biogram', function (Blueprint $table) {
            $table->id();
            $table->text('tresc');
            $table->tinyText('dzien_mies')->nullable();
            $table->tinyText('rok');
            $table->integer('kolejnosc');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biogram');
    }
};
