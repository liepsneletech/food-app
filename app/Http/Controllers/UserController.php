<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users = User::all();
        return view('pages.back.users.users', compact('users', 'user'));
    }

    function delete(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Sėkmingai ištrynėte vartotoją');
    }
}
