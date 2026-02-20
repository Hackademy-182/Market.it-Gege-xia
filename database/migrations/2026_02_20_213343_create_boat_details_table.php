<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boat_details', function ($table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete()->unique();

            $table->unsignedSmallInteger('length_m')->nullable();
            $table->unsignedSmallInteger('year')->nullable();
            $table->string('engine_type')->nullable();
            $table->unsignedSmallInteger('engine_hp')->nullable();
            $table->boolean('cabin')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boat_details');
    }
};
