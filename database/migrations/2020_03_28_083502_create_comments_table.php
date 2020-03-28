<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('equipment_id')->unsigned()->default(0);
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->string('title');
            $table->text('desc');
            $table->string('user_ip_address');
            $table->string('email');
            $table->bigInteger('parent_id')->unsigned()->default(0)->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('parent_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
