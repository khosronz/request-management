<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('factory')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->string('phone')->nullable();
            $table->string('pre_phone')->nullable();
            $table->string('country')->nullable();
            $table->text('desc')->nullable();
            $table->string('visible_to_everyone')->default('0');

            $table->rememberToken();
            $table->timestamps();
        });


        Schema::table('users', function ($table) {
            $table->string('api_token', 80)->after('password')
                ->unique()
                ->nullable()
                ->default(null);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
