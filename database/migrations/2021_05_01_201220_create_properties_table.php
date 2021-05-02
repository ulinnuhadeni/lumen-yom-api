<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('license');
            $table->string('website');
            $table->string('address');
            $table->string('country');
            $table->string('province');
            $table->string('postal_code');
            $table->integer('order_total_per_month');
            $table->boolean('credit_card_payment');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('properties_type');
            
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations');
    }
}
