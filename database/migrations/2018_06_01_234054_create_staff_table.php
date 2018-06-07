<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('fullName');
            $table->string('gender');
            $table->string('address');
            $table->string('email');
            $table->date('dateOfBirth');
            $table->longText('qualifications');
            $table->string('staffType')->nullable();
            $table->string('status')->nullable();
            $table->date('dateOfEmployment');
            $table->string('designation')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('phone');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('staff');
    }
}
