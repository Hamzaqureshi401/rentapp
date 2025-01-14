<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuperAdminRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add new role option 'super_admin' to the role column (enum)
            $table->enum('role', ['renter', 'buyer', 'super_admin'])->default('renter')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rollback to previous state without 'super_admin'
            $table->enum('role', ['renter', 'buyer'])->default('renter')->change();
        });
    }
}
