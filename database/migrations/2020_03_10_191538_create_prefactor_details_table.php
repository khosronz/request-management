<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrefactorDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefactor_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->default('1');
            $table->bigInteger('equipment_id')->unsigned()->default(0);
            $table->integer('num')->unsigned()->default(0);
            $table->string('unit_price');
            $table->bigInteger('prefactor_id')->unsigned()->default(0);
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->foreign('prefactor_id')->references('id')->on('prefactors');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prefactor_details');
    }
}
