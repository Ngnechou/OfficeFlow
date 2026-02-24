<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Logique pour afficher la liste des utilisateurs (si nécessaire)
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function updateRole(Request $request, User $user)
    {
        $user->update([
            'role' => $request->role
        ]);


        return redirect()->back()->with('success', 'Rôle mis à jour avec succès.');
    }
}
