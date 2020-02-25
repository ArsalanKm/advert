<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('city')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('price')->nullable();
            $table->string('email')->nullable();
            $table->boolean('chat')->default('0');
            $table->boolean('noemail')->default('0');
            $table->string('subject');
            $table->string('text')->nullable();
            $table->boolean('type')->default('0');
            $table->string('maker')->nullable();
            $table->string('date')->nullable();
            $table->unsignedInteger('category_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
