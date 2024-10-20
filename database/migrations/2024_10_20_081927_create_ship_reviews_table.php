<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ship_id'); // Foreign key for ships
            $table->unsignedBigInteger('user_id'); // Foreign key for the user who submitted the review
            $table->integer('rating')->comment('Rating out of 5');
            $table->text('review')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ship_reviews');
    }
}
