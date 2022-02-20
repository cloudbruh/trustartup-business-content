<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_users', function (Blueprint $table) {
            $table->id();
            $table->integer('reward_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['CREATED', 'SENT', 'RECIEVED']);
            $table->text('destination');
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
        Schema::dropIfExists('reward_users');
    }
}
