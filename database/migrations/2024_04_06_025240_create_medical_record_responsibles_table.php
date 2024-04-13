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
        Schema::create('medical_record_responsible', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')
                ->constrained('medical_records')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('responsible_id')
                ->constrained('responsibles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_record_responsible');
    }
};
