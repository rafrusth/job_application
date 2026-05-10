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
        Schema::create('qnas', function (Blueprint $table) {
            $table->unsignedBigInteger('id')
                    ->primary();
            $table->foreign('id')
                    ->references('id')
                    ->on('flashcards')
                    ->onDelete('cascade');
            $table->text('question');
            $table->text('answer');
            $table->string('type', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qnas');
    }
};
