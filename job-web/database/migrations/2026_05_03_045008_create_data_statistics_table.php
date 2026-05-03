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
        Schema::create('data_statistics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicant');
            $table->bigInteger('open_hire');    
            $table->bigInteger('reject');    
            $table->bigInteger('employment');    
            $table->foreignId('statistics_id')
                    ->constrained()
                    ->onDelete('cascade');    
            $table->foreignId('roles_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_statistics');
    }
};
