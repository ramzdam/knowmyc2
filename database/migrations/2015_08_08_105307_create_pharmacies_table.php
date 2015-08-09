<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode', 6);
            $table->string('npi');
            $table->string('dea');
            $table->string('nabp');
            $table->string('contact');
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->text('billing_address');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_zipcode', 6);
            $table->text('mailing_address');
            $table->string('mailing_city');
            $table->string('mailing_state');
            $table->string('mailing_zipcode', 6);
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
        Schema::drop('pharmacies');
    }
}
