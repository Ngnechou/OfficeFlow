<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController 
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

    public function show(User $user)
    {
        // Cette ligne va chercher la vue resources/views/users/show.blade.php
        return view('users.show', compact('user'));
    }
}
