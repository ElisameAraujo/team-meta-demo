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
        Schema::create('apartments_coordinates', function (Blueprint $table) {
            $table->id();
            $table->double('x_position')->unsigned();
            $table->double('y_position')->unsigned();
            $table->double('width')->unsigned();
            $table->double('height')->unsigned();

            $table->unique('apartment_id');
            $table->foreignId('apartment_id')
                ->references('id')
                ->on('apartments')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_coordinates');
    }
};
