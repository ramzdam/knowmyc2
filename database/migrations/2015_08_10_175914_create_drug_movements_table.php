<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_movements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drug_id')->unsigned()->index();
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->integer('pharmacist_id')->unsigned()->index();
            $table->foreign('pharmacist_id')->references('id')->on('pharmacists')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('type');
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
        Schema::drop('drug_movements');
    }
}
