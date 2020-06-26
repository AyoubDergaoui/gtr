<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('personnels', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nom');
      $table->string('prenom');
      $table->string('matricule');
      $table->index('matricule');
      $table->string('contrat');
      $table->date('debut')->nullable();
      $table->date('fin')->nullable();
      $table->unsignedDecimal('PU');
      $table->string('unite');
      $table->string('designation');
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
    Schema::dropIfExists('personnels');
  }
}
