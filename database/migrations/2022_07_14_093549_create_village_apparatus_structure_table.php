<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_apparatus_structures', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path')->nullable();
            $table->foreignId('apparatus_id')->constrained('villagers');
            $table->foreignId('position_id')->constrained('apparatus_positions');
            $table->year('from_year');
            $table->year('to_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('village_apparatus_structure');
    }
};
