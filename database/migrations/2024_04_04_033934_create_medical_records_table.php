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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->date('birth');
            $table->decimal('height', 3, 2);
            $table->decimal('weight', 5, 2);
            $table->string('blood_type', 5);
            $table->string('allergies', 100)->nullable();
            $table->string('medications', 100)->nullable();
            $table->string('diseases', 100)->nullable();
            $table->string('surgeries', 100)->nullable();
            $table->string('observations', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
