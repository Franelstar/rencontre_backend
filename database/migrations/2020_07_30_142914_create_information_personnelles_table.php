<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationPersonnellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_personnelles', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->enum('sexe', array('M','F'))->nullable();
            $table->date('date_naissance')->nullable();
            $table->integer('o_sexuele')->nullable();
            $table->text('apropro')->nullable();
            $table->enum('sexe_cherche', array('M','F'))->nullable();
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('information_personnelles');
    }
}
