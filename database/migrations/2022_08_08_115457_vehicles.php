<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function(Blueprint $table) {
            $table->id(); // Alias auf $table->increments();
            $table->char('brand', 50); // CHAR
            $table->string('registration', 20)->unique();
            $table->text('description'); // TEXT
            $table->string('category', 20); // VARCHAR
            $table->string('img', 100); // VARCHAR
            $table->enum('status', ['active', 'blocked'])->default('blocked'); // ENUM
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
