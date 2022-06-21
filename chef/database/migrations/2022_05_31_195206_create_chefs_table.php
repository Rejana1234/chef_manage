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
        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('chef_id')->unique();
            $table->string('chef_name');
            $table->string('email')->unique();
            $table->string('dob');
            $table->string('p_no')->unique();
            $table->string('gender');
            $table->string('address');
            $table->string('e_school');
            $table->string('e_college');
            $table->string('e_university');
            $table->string('experience');
            $table->string('speciality');
            $table->string('password');
            $table->string('con_password');
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
        Schema::dropIfExists('chefs');
    }
};
