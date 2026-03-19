<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Http\Requests\TaskRequest; 
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

        // Optimisation : 10 tâches par page au lieu de 2
        $tasks = $query->with('category')->latest()->paginate(10);
        $categories = Category::all();

        // Statistiques globales
        $allUserTasks = Task::where('user_id', $userId)->get();
        $stats = [
            'total'     => $allUserTasks->count(),
            'terminees' => $allUserTasks->where('status', 'Terminé')->count(),
            'attente'   => $allUserTasks->where('status', 'En cours')->count(),
            'a_faire'   => $allUserTasks->where('status', 'À faire')->count(),
        ];

        // Graphique des 7 derniers jours
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
     * Formulaire de création
     */
    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    /**
     * Enregistre une nouvelle tâche (Utilise TaskRequest pour le français)
     */
    public function store(TaskRequest $request) 
    {
        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status'      => $request->status,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Task $task)
    {
        if ($task->user_id !== Auth::id()) abort(403);

        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Mise à jour (Utilise TaskRequest pour le français)
     */
    public function update(TaskRequest $request, Task $task)
    {
        if ($task->user_id !== Auth::id()) abort(403);

        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Mise à jour réussie !');
    }

    /**
     * Suppression
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id()) abort(403);

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée !');
    }
}