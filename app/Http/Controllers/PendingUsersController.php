<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PendingUsersController extends Controller
{
  public function index() {
    $users = User::where("is_approved", 0)->get();
    return view("pending_users", ["users" => $users]);
  }
  public function accept($id) {
    User::where('id', $id)->update(['is_approved' => true]);
    return redirect()->route('pending_users');
  }
  public function reject($id) {
    User::destroy($id);
    return redirect()->route('pending_users');
  }
}
