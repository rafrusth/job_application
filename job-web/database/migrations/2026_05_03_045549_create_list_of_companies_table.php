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
        Schema::create('list_of_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_statistics_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->foreignId('companies_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->primary(['id', 'data_statistics_id', 'companies_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_of_companies');
    }
};
