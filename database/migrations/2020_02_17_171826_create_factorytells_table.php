<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactorytellsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factorytells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('tellnumber');
            $table->text('desc')->nullable();
            $table->bigInteger('factory_id')->unsigned()->default(0);
            $table->bigInteger('telltype_id')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('factory_id')->references('id')->on('factories');
            $table->foreign('telltype_id')->references('id')->on('telltypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('factorytells');
    }
}
