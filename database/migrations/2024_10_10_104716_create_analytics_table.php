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
    Schema::create('analytics', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('ship_id');
        $table->integer('total_bookings'); // Total bookings for this yacht
        $table->decimal('revenue_generated', 10, 2); // Total revenue generated
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('analytics');
}

};
