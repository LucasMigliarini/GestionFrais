<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemboursementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remboursement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utiMatricul');
            $table->unsignedBigInteger('etatCode');
            $table->date('date');
            $table->foreign('utiMatricul')->references('id')->on('users');
            $table->foreign('etatCode')->references('id')->on('etat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remboursement');
    }
}
