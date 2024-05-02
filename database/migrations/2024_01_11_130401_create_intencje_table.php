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
        Schema::create('intencje', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Nowa', 'Opublikowana', 'Archiwum'])->default('Nowa');
            $table->enum('typ', ['intencja', 'swiadectwo'])->nullable();
            $table->text('tresc_nadeslana')->nullable();
            $table->text('tresc_opublikowana')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intencje');
    }
};
