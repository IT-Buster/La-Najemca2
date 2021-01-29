<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('medium_type', ['woda', 'ciepło','prąd','gaz','odpady']);
            $table->date('month_medium_cost');
            $table->date('created_invoice_at');
            $table->date('pay_date_at');
            $table->double('use_medium', 8, 2);
            $table->double('invoice_amount', 8, 2);
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
        Schema::dropIfExists('provider_invoices');
    }
}
