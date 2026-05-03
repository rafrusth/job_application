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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)
                    ->unique();
            $table->string('password');
            $table->string('type', 15);
            $table->string('email')
                    ->unique()
                    ->nullable();
            $table->string('phone_number', 20)
                    ->unique()
                    ->nullable();
            $table->foreignId('cities_id')
                    ->constrained('cities')
                    ->onDelete('cascade')
                    ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
