<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('fuel_entries', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('vehicle_id');
        $table->unsignedBigInteger('driver_id');
        $table->date('date');
        $table->decimal('liters', 10, 2);
        $table->decimal('total_cost', 10, 2);
        $table->integer('odometer');
        $table->string('station_name');
        $table->string('receipt_image_path');
        $table->timestamps();

        $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_entries');
    }
};
