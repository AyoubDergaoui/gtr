<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
  protected $fillable = [
    'matricule',
    'nom',
    'prenom',
    'contrat',
    'debut',
    'fin',
    'PU',
    'unite',
    'designation',
  ];
}
