<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatimages', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('src')->nullable();
            $table->string('date')->nullable();

            $table->unsignedInteger('chat_id');

            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chatimages');
    }
}
