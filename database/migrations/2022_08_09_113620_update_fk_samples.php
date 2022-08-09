<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFkSamples extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samples', function (Blueprint $table) {
            // erzeuge eine neue spalte detail_id 
            $table->bigInteger('detail_id')->unsigned()->nullable();
            // setze FK referenz auf die id spalte aus der details Tabele
            $table->foreign('detail_id')->references('id')->on('details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->dropForeign('samples_detail_id_foreign');
            $table->dropColumn('detail_id');
        });
    }
}
