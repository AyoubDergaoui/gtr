<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
  protected $fillable = [
    'nom',
    'matricule',
    'PU',
    'unite',
    'fournisseur'
  ];
}
