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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates');
            $table->foreignId('work_experience_id')->constrained('work_experiences');
            $table->foreignId('education_id')->constrained('educations');
            $table->string('name')->unique();
            $table->longText('cover_letter')->nullable();
            $table->string('url')->nullable();
            $table->string('file_name')->nullable();

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
        Schema::dropIfExists('resumes');
    }
};
