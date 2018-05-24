<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('last_message_time');
            $table->integer('userRequest_id')->unsigned()->index()->nullable();
            $table->foreign('userRequest_id')->references('user_id')->on('claims')->onDelete('set null');
            $table->integer('donor_id')->unsigned()->index()->nullable();
            $table->foreign('donor_id')->references('user_id')->on('records')->onDelete('set null');
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
        Schema::dropIfExists('conversations');
    }
}
