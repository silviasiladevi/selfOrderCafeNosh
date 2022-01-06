<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailtrxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtrxes', function (Blueprint $table) {
            $table->string('kode_trx')->unique()->primary()->nullable;
            $table->unsignedBigInteger('user_id');
            $table->integer('harga_trx');
            $table->integer('total_bayar');
            $table->integer('kembalian');
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailtrxes');
    }
}