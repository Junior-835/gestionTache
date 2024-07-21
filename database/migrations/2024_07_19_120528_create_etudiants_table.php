<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("nom"); // nom de la tache
            $table->string("description"); // description de la tache
            $table->date("date"); // date d'echeance de notre tache
            $table->enum("priority", ['basse', 'moyenne', 'haute']); // priorite de la tache
            $table->timestamps(); // je pense que ca enregistre la date de creation et de mise a jour
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
