<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('renter_id');
            $table->foreign('renter_id')->references('id')->on('renters');
            $table->foreignId('flat_id');
            $table->foreign('flat_id')->references('id')->on('flats');
            $table->date('created_contract_at');
            $table->date('started_contract_at');
            $table->date('ending_at')->nullable();
            $table->integer('person_no');
            $table->double('rent_amount', 8, 2);
            $table->binary('contract_image');
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
        Schema::dropIfExists('contracts');
    }
}
