<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmgPayTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('omg_pay_transactions')) {
            Schema::create('omg_pay_transactions', function (Blueprint $table) {
                $table->id();

                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

                $table->unsignedBigInteger('credit_card_id')->nullable();
                $table->foreign('credit_card_id')
                    ->references('id')
                    ->on('omg_credit_cards');

                $table->unsignedBigInteger('subscription_id')->nullable();
                $table->foreign('subscription_id')
                    ->references('id')
                    ->on('omg_subscriptions');

                $table->json('product_json')->nullable();
                $table->string('conversation_id')->index();
                $table->string('payment_transaction_id')->nullable()->index();

                $table->decimal('price', 6, 2);
                $table->string('payment_id')->nullable();
                $table->string('card_name')->nullable();

                //Error Success Detail
                $table->string('status')->nullable();
                $table->string('status_detail')->nullable()->comment('Para iadesi durumunda, iade bilgileri json olarak eklenir');
                $table->longText('raw_result')->nullable();

                //Bill
                $table->string('invoice_id')->nullable();
                $table->string('invoice_url')->nullable();
                $table->timestamps();
                $table->softDeletes()->comment('Para iadesi durumunda delete edilir');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('omg_pay_transactions');
    }
}
