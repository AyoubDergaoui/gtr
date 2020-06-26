<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuiviPersonnel extends Model
{
    protected $table = "suivi_personnel";

    protected $fillable = [
      'personnel_id',
      'personnel_nom',
      'personnel_prenom',
      'personnel_matricule',
      'personnel_contrat',
      'personnel_PU',
      'personnel_unite',
      'heures',
      'date',
      'atelier'
    ];
}
