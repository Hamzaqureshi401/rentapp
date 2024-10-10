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
    Schema::create('ships', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('owner_id'); // Reference to the user/admin who owns the boat
        $table->string('name'); // Name of the boat
        $table->string('type'); // Type (yacht, sailboat, etc.)
        $table->integer('length'); // Length of the ship in feet/meters
        $table->integer('berths'); // Number of berths (sleeping accommodations)
        $table->integer('bathrooms'); // Number of bathrooms
        $table->json('equipment'); // List of equipment (stored as JSON array)
        $table->json('crew'); // List of crew members (stored as JSON array)
        $table->json('route'); // Sailing route (stored as JSON array)
        $table->decimal('price_per_week', 8, 2); // Weekly rental price
        $table->boolean('skipper_required')->default(false); // Skipper required flag
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('ships');
}

};
