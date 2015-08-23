<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drug_id')->unsigned()->index(); // NDC is connected on this ID
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $table->integer('drug_movement_id')->unsigned()->index(); // NDC is connected on this ID
            $table->foreign('drug_movement_id')->references('id')->on('drug_movements')->onDelete('cascade');
            $table->string('dea_no', 40); // Dea of the manufacturer not the Pharmacy's DEA
            $table->integer('is_incoming')->unsigned(); // 1 = incoming, 0 = outgoing
            $table->integer('distributor_id')->unsigned()->index(); // Witnessing pharmacists
            $table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade');
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
        Schema::drop('inventory_drugs');
    }
}
