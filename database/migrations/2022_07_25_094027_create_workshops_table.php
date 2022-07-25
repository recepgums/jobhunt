<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('district_id')->constrained('districts');
            $table->tinyInteger('sale_type')->comment('0 => Kiralik, 1=>Satilik,2=>Devren');
            $table->foreignId('package_id')->constrained('packages');
            $table->string('title');
            $table->longText('description');
            $table->string('slug')->unique()->index();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->decimal('price',9,2);
            $table->boolean('is_price_fixed')->comment("0=>Fiyat esnek pazarlik yapilir, 1=>Fiyat degismez")->default(0);
            $table->integer('square')->comment("Kac metrekare")->nullable();
            $table->time('night_mode_start_at')->comment("Saat kactan sonra iletisim bilgisi gozukmeyecek")->nullable();
            $table->time('night_mode_end_at')->comment("Saat kactan sonra iletisim bilgisi gozukecek")->nullable();
            $table->integer('view_counter')->default(0);

            $table->softDeletes();
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
        Schema::dropIfExists('workshops');
    }
};
