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
            $table->foreignId('roles_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->unsignedBigInteger('specifics_id');
            $table->foreign('specifics_id')
                    ->references('id')
                    ->on('specifics')
                    ->onDelete('cascade');
            $table->primary(['id', 'roles_id', 'specifics_id']);
            $table->unique(['roles_id', 'specifics_id']);
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
