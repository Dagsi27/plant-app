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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('species_id')->nullable()->constrained();
            $table->string('name');
            $table->string('purchase_date')->nullable();
            $table->integer('watering_frequency');
            $table->enum('light_requirements', ['none', 'low', 'medium', 'high']);
            $table->enum('soil_type', ['none', 'sand', 'clay', 'loam', 'peat', 'chalk', 'silt', 'silt_loam', 'sandy_loam', 'clay_loam', 'silica']);
            $table->longText('notes')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
