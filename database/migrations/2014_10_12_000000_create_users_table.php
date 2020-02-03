<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('password');
            $table->string('nipbps',9)->unique();
            $table->string('nipbaru',18)->unique();
            $table->string('email')->nullable();
            $table->string('username')->unique();
            $table->string('jabatan',20);
            $table->string('satuankerja');
            $table->string('urlfoto');
            $table->boolean('jk')->unsigned();
            $table->string('gol',3)->nullable();
            $table->boolean('mitra')->default(1);
            $table->boolean('aktif')->default(1);
            $table->boolean('level')->default(1);
            $table->boolean('isLokal')->default(0);
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
