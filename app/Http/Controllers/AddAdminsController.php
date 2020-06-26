<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AddAdminsController extends Controller
{
  public function index()
  {
    $users = User::where('is_admin', false)
      ->where('is_approved', true)
      ->get();
    return view('add_admins', ['users' => $users]);
  }

  public function add($id)
  {
    $users = User::where('id', $id)->update(["is_admin" => true]);
    return redirect()->route("add_admins");
  }
}
