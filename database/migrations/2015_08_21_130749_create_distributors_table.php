<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type')->unsigned();
            $table->string('contact');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode', 6);
            $table->string('npi');
            $table->string('dea');
            $table->string('rep');
            $table->text('note');
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
        Schema::drop('distributors');
    }
}
