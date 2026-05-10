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
        Schema::create('sets_of_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->foreignId('set_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->primary(['id', 'role_id', 'set_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets_of_roles');
    }
};
