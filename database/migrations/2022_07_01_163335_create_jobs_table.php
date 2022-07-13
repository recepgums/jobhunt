<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('gender_id')->comment('1=> erkek,2=>kadin')
                ->nullable()
                ->constrained('genders');
            $table->foreignId('work_type_id')->nullable()->constrained('work_types')->comment('1-Full time,2 Part time')->default(1);
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('district_id')->nullable()->constrained('districts');
            $table->foreignId('package_id')->nullable()->constrained('packages');


            $table->string('title');
            $table->string('description');
            $table->string('slug')->unique()->index();
            $table->string('cover_image')->nullable();

            $table->integer('fee')->nullable();
            $table->integer('currency_id')->nullable();

            $table->tinyInteger('level')->comment('1=> cirak,2=>kalfa 3 usta')->nullable()->index();
//            $table->tinyInteger('qualification')->comment('universite mezunu lise mezunu')->nullable()->index();
            $table->boolean('has_contract')->nullable();
            $table->tinyInteger('experience_year')->nullable();

            $table->dateTime('published_until_at')->nullable();
            $table->tinyInteger('status')->default(\App\Models\Job::STATUS['pending']);
            $table->integer('view_counter')->default(0);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('jobs');
    }
};
