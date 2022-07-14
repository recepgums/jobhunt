<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmgSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('omg_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('credit_card_id')->comment('sonraki odemenin yapilacagi kart'); //silinebilir
            $table->foreign('credit_card_id')
                ->references('id')
                ->on('omg_credit_cards');

            $table->unsignedBigInteger('parent_id')->nullable()->comment('Ilk odeme null, sonraki kayitlarda sadece ana parenti tutacak');
            $table->foreign('parent_id')
                ->references('id')
                ->on('omg_subscriptions');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->float('paid_price');//10-10" 10-15` 15-15
            $table->float('next_price')->nullable();

            $table->date('start_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->boolean('is_expired')->default(false);

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
        Schema::dropIfExists('omg_subscriptions');
    }
}
