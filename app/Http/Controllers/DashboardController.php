<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Importation nécessaire pour les dates

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $chartLabels = [];
        $chartValues = [];

        // Préparation des données du graphique (7 derniers jours)
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartLabels[] = $date->translatedFormat('D'); // Ex: Lun, Mar...
            
            $query = Task::whereDate('created_at', $date->format('Y-m-d'));
            
            // Si l'utilisateur n'est pas admin, on filtre par son ID
            if ($user->role !== 'admin') {
                $query->where('user_id', $user->id);
            }
            
            $chartValues[] = $query->count();
        }

        if ($user->role === 'admin') {
            $stats = [
                'total'     => Task::count(),
                'a_faire'   => Task::where('status', 'À faire')->count(),
                'en_cours'  => Task::where('status', 'En cours')->count(),
                'terminees' => Task::where('status', 'Terminé')->count(),
                'users_count' => User::count(), 
            ];

            $recentTasks = Task::with(['category', 'user']) 
                            ->latest()
                            ->take(5)
                            ->get();
        } else {
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

        // Il faut passer TOUTES les variables ici
        return view('dashboard', compact('stats', 'recentTasks', 'chartLabels', 'chartValues'));
    }
}