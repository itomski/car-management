<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('gender', ['w','m']);
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('city', 25)->nullable();
            $table->string('street', 25)->nullable();
            $table->string('street_nr', 10)->nullable();
            $table->string('zip', 12)->nullable();
            $table->string('country', 25)->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                            ->references('id')
                            ->on('users')
                            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
