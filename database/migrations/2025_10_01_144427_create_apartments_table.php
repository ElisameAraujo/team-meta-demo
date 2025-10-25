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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('unit_code')->unique();
            $table->decimal('total_area', 10, 2);
            $table->decimal('covered_area', 10, 2);
            $table->decimal('semi_covered_area', 10, 2);
            $table->decimal('uncovered_area', 10, 2);
            $table->decimal('common_area', 10, 2);
            $table->decimal('storage_size', 10, 2)->nullable();
            $table->integer('ambients');
            $table->integer('floor');
            $table->decimal('price', 20, 2);
            $table->integer('apartment_status_id');
            $table->integer('section_id');

            $table->foreignId('building_id')
                ->constrained('buildings')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
