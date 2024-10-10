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
    Schema::create('geofencing', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('ship_id');
        $table->decimal('latitude', 10, 7); // Latitude of the geofence
        $table->decimal('longitude', 10, 7); // Longitude of the geofence
        $table->float('radius'); // Radius in meters
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('geofencing');
}

};
