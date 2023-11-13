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
        Schema::create('region_points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('center_id');
            //$table->unsignedBigInteger('device_id')->nullable();
            $table->double('lat');
            $table->double('lng');
            $table->unsignedBigInteger('type_id');
            $table->unsignedInteger('point_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('region_points');
    }
};
