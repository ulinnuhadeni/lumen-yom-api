<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTypeTable extends Migration
{
    public function up()
    {
        Schema::create('properties_type', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('properties_type');
    }
}
