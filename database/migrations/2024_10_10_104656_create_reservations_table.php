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
    Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('ship_id');
        $table->date('start_date');
        $table->date('end_date');
        $table->boolean('skipper')->default(false); // Whether the reservation includes a skipper
        $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
        $table->timestamps();

        // Foreign key constraints
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('reservations');
}

};
