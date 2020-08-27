<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationPhysiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_physiques', function (Blueprint $table) {
            $table->integer('user_id');
            $table->enum('continent', array('Afrique','Asie','Europe','Amérique','Australie'))->nullable();
            $table->float('taille')->nullable();
            $table->enum('couleur_peau', array('Noir', 'Blanche', 'Brun', 'Metisse'))->nullable();
            $table->enum('silhouette', array('Athletique', 'Gros', 'Mince', 'Moyen'))->nullable();
            $table->enum('couleur_yeux', array('Noir', 'Bleu', 'Vert'))->nullable();
            $table->string('couleur_cheuveux')->nullable();
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
        Schema::dropIfExists('information_physiques');
    }
}
