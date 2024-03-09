<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('message', 'you cant delete admin users');
        }
        $user->delete();
        return back()->with('message', 'user deleted');
    }
}
