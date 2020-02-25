<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('brand')->nullable();
            $table->string('year')->nullable();
            $table->string('sunation')->nullable();
            $table->boolean('type')->default('0');
            $table->unsignedInteger('advert_id');
            $table->foreign('advert_id')->references('id')->on('adverts')->onDelete('cascade');
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
        Schema::dropIfExists('cars');
    }
}
