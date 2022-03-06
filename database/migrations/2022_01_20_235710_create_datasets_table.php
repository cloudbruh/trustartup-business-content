<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->integer('moderatable_id')->unsigned();
            $table->enum('moderatable_type', ['ROLE_CREATOR', 'ROLE_APPLICANT', 'STARTUP']);
            $table->text('content');
            $table->enum('status', ['CREATED', 'PENDING', 'GRANTED', 'PROHIBITED'])->default('CREATED');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('datasets');
    }
}
