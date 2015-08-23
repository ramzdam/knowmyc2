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
            $table->integer('drug_id')->unsigned()->index(); // NDC is connected on this ID
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->integer('pharmacist_id')->unsigned()->index();
            $table->foreign('pharmacist_id')->references('id')->on('pharmacists')->onDelete('cascade');
            $table->integer('current_soh');
            $table->integer('quantity')->unsigned();
            $table->integer('type'); // 1 = incoming, 2 = outgoing, 3 = Dispensed, 4 = Returned, 5 = Broken, 6 = Expired
            $table->timestamps();

//            $table->integer('drug_id')->unsigned()->index(); // NDC is connected on this ID
//            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
//            $table->integer('pharmacist_id')->unsigned()->index(); // Witnessing pharmacists
//            $table->foreign('pharmacist_id')->references('id')->on('pharmacists')->onDelete('cascade');
//            $table->string('dea_no', 40); // Dea of the manufacturer not the Pharmacy's DEA
//            $table->string('rx_no', 40); // Prescription or script_no of purchase
//            $table->string('invoice_no'); // Receipt number
//            $table->dateTime('date_in'); // Time of purchase of incoming or Time of purchase for outgoing

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
