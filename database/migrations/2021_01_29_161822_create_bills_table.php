<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flat_id');
            $table->foreign('flat_id')->references('id')->on('flats');
            $table->foreignId('renter_id');
            $table->foreign('renter_id')->references('id')->on('renters');
            $table->foreignId('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->date('created_bill_at');
            $table->date('month_rent');
            $table->date('month_medium_cost');
            $table->integer('person_no');
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
        Schema::dropIfExists('bills');
    }
}
