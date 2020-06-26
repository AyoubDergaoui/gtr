<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('engines', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('nom');
      $table->string('matricule');
      $table->unsignedDecimal('PU');
      $table->string("unite");
      $table->string("fournisseur");
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
    Schema::dropIfExists('engines');
  }
}
