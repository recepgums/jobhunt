<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmgCreditCardsTable extends Migration
{
    public function up()
    {
      if (!Schema::hasTable('omg_credit_cards'))
      {
          Schema::create('omg_credit_cards', function (Blueprint $table) {
              $table->id();

              $table->unsignedBigInteger('user_id');
              $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

              $table->string('user_key');
              $table->string('token');
              $table->string('card_holder_name', 100);
              $table->string('last_four_digits');
              $table->boolean('default')->default(0);
              $table->string('bank')->nullable();
              $table->timestamps();
          });
      }
    }

    public function down()
    {
        Schema::dropIfExists('omg_credit_cards');
    }

}
