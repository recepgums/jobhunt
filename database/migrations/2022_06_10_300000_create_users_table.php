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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->longText('about')->nullable();
            $table->integer('age')->nullable();
            $table->string('profile_image_url')->nullable();
            $table->integer('experience_year')->nullable();
            $table->bigInteger('expected_salary')->nullable();
            $table->string('company_name')->nullable();
            $table->boolean('is_searchable_for_job')->nullable();
            $table->unsignedBigInteger('user_type')->nullable()->index();
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('district_id')->nullable()->constrained('districts');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('verify_code')->nullable();
            $table->string('password');
            $table->string('token')->unique()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
