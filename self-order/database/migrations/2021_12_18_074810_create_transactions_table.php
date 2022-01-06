<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('No_trx')->unique()->nullable;
            $table->char('kode_trx');
            $table->unsignedBigInteger('menu_id');
            $table->integer('jml_beli');
            $table->integer('total_harga');




            $table->foreign('menu_id')->references('id_menu')->on('menus');
            $table->foreign('kode_trx')->references('kode_trx')->on('detailtrxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}