<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
  public function index(Request $request)
  {
    
    //書き方①
    // $users = User::all();
    // return inertia('User')->with([
    //   'users' => $users,
    // ]);

    //書き方②
    // $users = User::all();
    // return Inertia::render('User', [
    //   'users' => $users]);

    //書き方③
    return Inertia::render('User', [
      'users' => User::all([
        'id',
        'name',
        'email',
      ])
    ]);
  }

  public function edit(Request $request, $id)
  {
      $user = User::findOrFail($id);
      return Inertia::render('Edit', [
        'user' => $user,
      ]);
  }

  public function update(Request $request ,User $user)
  {
      $request->validate([
          'name' => 'required|max:50',
          'email' => 'required|string',
      ]);
      $user->update($request->all());
      return redirect()->route('user.index')->with('message', '更新しました');;
  }
}
