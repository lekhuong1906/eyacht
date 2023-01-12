<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rent_regis_name');
            $table->integer('user_id');
            $table->integer('yacht_id');
            $table->integer('customer_id');
            $table->integer('tour_id');
            $table->integer('service_id');
            $table->date('rental_date');
            $table->integer('rental_hours');
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
        Schema::dropIfExists('rent_registrations');
    }
}
