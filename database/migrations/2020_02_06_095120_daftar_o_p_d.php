<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarOPD extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_opd', function (Blueprint $table) {
            $table->Increments('opd_id');
            $table->string('opd_kodebps',4);
            $table->string('opd_nama');
            $table->string('opd_alamat');
            $table->bigInteger('opd_tim')->default(0);
            $table->boolean('opd_flag')->default(1);
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
        Schema::dropIfExists('t_opd');
    }
}
