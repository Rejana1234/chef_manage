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
        Schema::create('chef_regs', function (Blueprint $table) {
            $table->id();
            $table->string('chef_id');
            $table->string('chef_name');
            $table->string('email');
            $table->string('dob');
            $table->string('p_no');
            $table->string('gender');
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
        Schema::dropIfExists('chef_regs');
    }
};
