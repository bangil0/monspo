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
            $table->string('password')->nullable();
            $table->string('nipbps',9)->unique();
            $table->string('nipbaru',18)->unique();
            $table->string('email')->nullable();
            $table->string('username')->unique();
            $table->string('jabatan',20);
            $table->string('kodebps',4);
            $table->string('satuankerja');
            $table->string('urlfoto');
            $table->boolean('jk')->unsigned();
            $table->boolean('mitra')->default(1);
            $table->boolean('aktif')->default(1);
            $table->boolean('level')->default(1);
            $table->boolean('isLokal')->default(0);
            $table->string('lastip',20)->nullable();
            $table->dateTime('lastlogin')->nullable();
            $table->string('passwd')->nullable();
            $table->string('nohp',25)->nullable();
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
