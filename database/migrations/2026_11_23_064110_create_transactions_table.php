<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transactions_id');
            $table->string('transactions_code');
            $table->foreignId('customers_id')->references('customers_id')->on('customers');
            $table->foreignId('users_id')->references('users_id')->on('users');
            $table->decimal('total_amount', 15, 2);
            $table->decimal('paid_amount', 15, 2);
            $table->decimal('change_amount', 15, 2);
            $table->enum('payment_method', ['cash', 'transfer']);
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamp('transactions_date');
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
        Schema::dropIfExists('transactions');
    }
}
