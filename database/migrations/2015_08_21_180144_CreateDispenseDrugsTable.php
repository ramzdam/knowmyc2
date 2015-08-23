<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispenseDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispensed_drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drug_id')->unsigned()->index(); // NDC is connected on this ID
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->integer('drug_movement_id')->unsigned()->index(); // NDC is connected on this ID
            $table->foreign('drug_movement_id')->references('id')->on('drug_movements')->onDelete('cascade');
            $table->string('rx_no', 40); // Prescription or script_no of purchase
            $table->dateTime('date_in'); // Time of purchase of incoming or Time of purchase for outgoing
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
        Schema::drop('dispensed_drugs');
    }
}
