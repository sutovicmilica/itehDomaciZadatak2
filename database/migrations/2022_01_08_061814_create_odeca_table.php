<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdecaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odeca', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->text('opis');
            $table->integer('tip_id')->unsigned();
            $table->timestamps();

            $table->foreign('tip_id')->references('id')->on('tipovi')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odeca');
    }
}
