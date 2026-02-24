<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User; // Ajouté pour compter les membres
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // --- LOGIQUE ADMIN : Voit tout le monde ---
            $stats = [
                'total'     => Task::count(),
                'a_faire'   => Task::where('status', 'À faire')->count(),
                'en_cours'  => Task::where('status', 'En cours')->count(),
                'terminees' => Task::where('status', 'Terminé')->count(),
                'users_count' => User::count(), // Stats bonus pour l'admin
            ];

            $recentTasks = Task::with(['category', 'user']) // On charge aussi l'auteur de la tâche
                            ->latest()
                            ->take(5)
                            ->get();
        } else {
            // --- LOGIQUE USER : Ne voit que ses tâches (Ton code actuel) ---
            $stats = [
                'total'     => Task::where('user_id', $user->id)->count(),
                'a_faire'   => Task::where('user_id', $user->id)->where('status', 'À faire')->count(),
                'en_cours'  => Task::where('user_id', $user->id)->where('status', 'En cours')->count(),
                'terminees' => Task::where('user_id', $user->id)->where('status', 'Terminé')->count(),
            ];

            $recentTasks = Task::with('category')
                            ->where('user_id', $user->id)
                            ->latest()
                            ->take(5)
                            ->get();
        }

        return view('dashboard', compact('stats', 'recentTasks'));
    }
}