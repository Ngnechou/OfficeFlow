<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    // Affiche la liste des tâches
    public function index()
    {
        // 1. Récupération des données avec catégorie et utilisateur
        $tasks = Task::with('category')
                    ->where('user_id', Auth::id())
                    ->latest()
                    ->get();

        // 2. Récupération des catégories pour le formulaire/sidebar
        $categories = Category::all();

        // 3. Calcul des statistiques pour le tableau de bord
        $stats = [
            'total'     => $tasks->count(),
            'terminees' => $tasks->where('status', 'Terminé')->count(),
            'attente'   => $tasks->where('status', 'En cours')->count(),
            'a_faire'   => $tasks->where('status', 'À faire')->count(),
        ];

        // On renvoie vers la vue tasks.index (ou dashboard selon ta préférence)
        return view('tasks.index', compact('tasks', 'categories', 'stats'));
    }

    // Affiche le formulaire de création
    public function create() 
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    // Enregistre la tâche
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
            'status'      => $validated['status'],
            'category_id' => $validated['category_id'],
            'user_id'     => Auth::id(), 
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }

   // 1. Pour afficher le formulaire
public function edit(Task $task)
{
    // Sécurité : on vérifie que la tâche appartient bien à l'utilisateur connecté
    if ($task->user_id !== auth()->id()) {
        abort(403);
    }

    $categories = \App\Models\Category::all();
    return view('tasks.edit', compact('task', 'categories'));
}

// 2. Pour enregistrer les modifications (C'est cette méthode qui manque !)
public function update(Request $request, Task $task)
{
    // Sécurité
    if ($task->user_id !== auth()->id()) {
        abort(403);
    }

    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'status'      => 'required|in:À faire,En cours,Terminé',
    ]);

    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès !');
}

// 3. Et pour la suppression tant qu'on y est
public function destroy(Task $task)
{
    if ($task->user_id !== auth()->id()) {
        abort(403);
    }

    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Tâche supprimée !');
}
}