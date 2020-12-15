<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorsfraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horsfrais', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('montant');
            $table->string('libelle');
            $table->unsignedBigInteger('rembCode');
            $table->foreign('rembCode')->references('id')->on('remboursement');
            $table->string('situation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horsfrais');
    }
}
