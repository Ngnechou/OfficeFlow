<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TasksController extends Controller
{
    /**
     * Affiche la liste des tâches et le dashboard
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $query = Task::where('user_id', $userId);

        // Recherche par mot-clé
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Filtre par statut
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tasks = $query->with('category')->latest()->get();
        $categories = Category::all();

        // Statistiques globales pour les compteurs
        $allUserTasks = Task::where('user_id', $userId)->get();
        $stats = [
            'total'     => $allUserTasks->count(),
            'terminees' => $allUserTasks->where('status', 'Terminé')->count(),
            'attente'   => $allUserTasks->where('status', 'En cours')->count(),
            'a_faire'   => $allUserTasks->where('status', 'À faire')->count(),
        ];

        // Préparation des données du graphique (7 derniers jours)
        $chartLabels = [];
        $chartValues = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartLabels[] = $date->translatedFormat('D'); 
            $chartValues[] = Task::where('user_id', $userId)
                                ->whereDate('created_at', $date->format('Y-m-d'))
                                ->count();
        }

        $recentTasks = $allUserTasks->sortByDesc('created_at')->take(4);

        return view('tasks.index', compact('tasks', 'categories', 'stats', 'chartLabels', 'chartValues', 'recentTasks'));
    }

    /**
     * Affiche le formulaire de création (C'est cette méthode qui manquait !)
     */
    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    /**
     * Enregistre une nouvelle tâche
     */
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:À faire,En cours,Terminé',
        ]);

        Task::create([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'status'      => $validated['status'],
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Task $task)
    {
        // Sécurité : vérifier que l'utilisateur est propriétaire
        if ($task->user_id !== Auth::id()) abort(403);

        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Met à jour la tâche
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) abort(403);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:À faire,En cours,Terminé',
            'description' => 'nullable|string',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Mise à jour réussie !');
    }

    /**
     * Supprime la tâche
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) abort(403);

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée !');
    }
}