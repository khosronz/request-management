<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactoryaddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factoryaddresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('factory_id')->unsigned()->default(0);
            $table->text('desc');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('factory_id')->references('id')->on('factories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('factoryaddresses');
    }
}
