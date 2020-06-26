<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConcasseurController extends Controller
{
  public function index() {
    return view('concasseur', ['hide_main' => true]);
  }
}
