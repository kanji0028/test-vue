<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
  public function index(Request $request)
  {
      $users = User::all();
      // dd($users);
      // return $channel->chats()->search()->paginate(5)->withQueryString();
      return inertia('User')->with([
        'users' => $users,
      ]);
        // 'status' => session('status'),

        // return Inertia::render('User');
  }
}
