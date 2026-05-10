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
        Schema::create('role_based_qnas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->unsignedBigInteger('specific_id');
            $table->foreign('specific_id')
                    ->references('id')
                    ->on('specifics')
                    ->onDelete('cascade');
            $table->primary(['id', 'role_id', 'specific_id']);
            $table->unique(['role_id', 'specific_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_based_qnas');
    }
};
