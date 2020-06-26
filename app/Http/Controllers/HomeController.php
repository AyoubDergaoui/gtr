<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

  public function index()
  {
    return view('home');
  }

  public function needs_approval()
  {
    if(Auth::user()->is_approved)
      return redirect()->route("home");
    return view('needs_approval');
  }
}
