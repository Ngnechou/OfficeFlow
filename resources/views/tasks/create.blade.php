<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('tasks.index') }}" class="text-slate-400 hover:text-indigo-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                {{ __('Créer une nouvelle tâche') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-2xl">
                <div class="p-8">
                    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Titre de la tâche</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                class="block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl shadow-sm transition-all" 
                                placeholder="Ex: Rédaction du rapport mensuel" required>
                            @error('title') <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-2">Catégorie</label>
                                <select name="category_id" id="category_id" 
                                    class="block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl shadow-sm transition-all" required>
                                    <option value="">-- Choisir une catégorie --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">Statut initial</label>
                                <select name="status" id="status" 
                                    class="block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl shadow-sm transition-all">
                                    <option value="À faire" {{ old('status') == 'À faire' ? 'selected' : '' }}>À faire</option>
                                    <option value="En cours" {{ old('status') == 'En cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="Terminé" {{ old('status') == 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                </select>
                                @error('status') <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Description / Détails</label>
                            <textarea name="description" id="description" rows="4" 
                                class="block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl shadow-sm transition-all" 
                                placeholder="Précisez les détails de la tâche ici...">{{ old('description') }}</textarea>
                            @error('description') <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6">
                            <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">
                                Annuler
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-xl font-bold text-white shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Créer la tâche
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>