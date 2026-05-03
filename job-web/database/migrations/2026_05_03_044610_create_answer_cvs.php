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
        Schema::create('answer_cvs', function (Blueprint $table) {
            $table->id();
            $table->text('experience');
            $table->text('education');            
            $table->text('skill');
            $table->text('project')
                    ->nullable();
            $table->foreignId('cvs_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->primary(['id', 'cvs_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_cvs');
    }
};
