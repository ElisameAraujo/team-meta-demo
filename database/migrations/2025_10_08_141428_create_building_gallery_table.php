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
        Schema::create('building_gallery', function (Blueprint $table) {
            $table->id();

            $table->foreignId('building_id')
                ->nullable()
                ->constrained('buildings')
                ->onDelete('cascade');

            $table->foreignId('section_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');


            $table->string('building_image');
            $table->string('type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building_gallery');
    }
};;
