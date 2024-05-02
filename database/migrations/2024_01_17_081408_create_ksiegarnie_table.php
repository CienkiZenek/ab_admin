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
        Schema::create('ksiegarnie', function (Blueprint $table) {
            $table->id();
            $table->text('nazwa');
            $table->text('link');
            $table->enum('link_nofollow', ['tak', 'nie'])->default('nie');
            $table->enum('dostepna', ['tak', 'nie'])->default('tak');
            $table->text('opis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ksiegarnie');
    }
};
