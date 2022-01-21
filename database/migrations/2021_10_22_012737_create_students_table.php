<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->text('avatar'); // número de matricula
            $table->text('cover');
            $table->string('enrollment')->nullable()->unique();
            $table->string('document')->nullable()->unique();
            $table->string('registration_proof')->nullable();
            $table->boolean('open_to_work')->default(false);
            $table->string('phone')->nullable();
            $table->string('academic_institution_email')->nullable(); //email from academic institution
            $table->json('academic_institution_data')->nullable(); //data from academic institution
            $table->json('social_networks')->nullable();
            $table->mediumText('resume')->nullable();

            $table->foreignId('user_id')->constrained();

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
        Schema::dropIfExists('students');
    }
}
