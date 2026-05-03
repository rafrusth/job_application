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
        Schema::create('scope_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companies_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->foreignId('sets_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->primary(['id', 'companies_id', 'sets_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scope_companies');
    }
};
