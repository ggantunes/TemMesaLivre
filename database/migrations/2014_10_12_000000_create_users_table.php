<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('profile', [1,2,3])->default(3);
            $table->string('userName');
            $table->string('companyName');
            $table->string('ctr')->unique(); //Corporate Taxpayer Registry (CNPJ)
            $table->string('itr')->unique(); //Individual Taxpayer Registry (CPF)
            $table->string('nic')->unique(); //National Identity Card (RG)
            $table->string('cel');
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
}
