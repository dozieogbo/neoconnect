<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCompensationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_compensations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps('created_at');
            $table->uuid('member_id');
            $table->foreign('member_id')->references('user_id')->on('members');
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')->references('id')->on('levels');
            $table->boolean('has_received');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_compensations');
    }
}
