<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vnp_TxnRef');
            $table->string('vnp_OrderInfo');
            $table->string('vnp_ResponseCode');
            $table->string('vnp_TransactionNo');
            $table->string('vnp_BankCode');
            $table->unsignedBigInteger('vnp_Amount');
            $table->bigInteger('userId');
            $table->bigInteger('videoId');
            $table->timestamp('vnp_PayDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
