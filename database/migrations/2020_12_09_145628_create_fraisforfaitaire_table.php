<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFraisforfaitaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fraisforfaitaire', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('quantite');
            $table->unsignedBigInteger('fraisCode');
            $table->unsignedBigInteger('rembCode');
            $table->foreign('fraisCode')->references('id')->on('frais');
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
        Schema::dropIfExists('fraisforfaitaire');
    }
}
