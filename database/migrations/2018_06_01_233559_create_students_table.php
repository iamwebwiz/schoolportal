<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('image')->nullable();
            $table->text('fullName');
            $table->string('gender');
            $table->date('dateOfBirth');
            $table->date('admissionDate');
            $table->text('peculiarities')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('parentRelationship')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('students');
    }
}
