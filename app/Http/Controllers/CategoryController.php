<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'created_at')->paginate(2);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {

        Category::create($request->validated());

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie ajoutée !');
    }

    // 1. Affiche le formulaire d'édition
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // 2. Met à jour la catégorie dans la base de données
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée !');
    }
}
