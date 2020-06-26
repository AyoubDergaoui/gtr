<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviPersonnelTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('suivi_personnel', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('personnel_id')->nullable();
      $table->string('personnel_nom');
      $table->string('personnel_prenom');
      $table->string('personnel_matricule');
      $table->string('personnel_contrat');
      $table->unsignedDecimal('personnel_PU');
      $table->string('personnel_unite');

      $table->unsignedDecimal('heures');
      $table->date('date');
      $table->string('atelier');

      $table->timestamps();

      $table->foreign('personnel_id')
        ->references('id')->on('personnels')
        ->onDelete('SET NULL');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('suivi_personnel');
  }
}
