<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('tasks.index') }}" class="text-slate-400 hover:text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">Modifier : {{ $task->title }}</h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
    @if(session('success'))
        <div id="alert-success" class="flex items-center p-4 mb-4 text-emerald-800 border-t-4 border-emerald-500 bg-emerald-50 rounded-xl shadow-sm transition-all duration-500" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <div class="ml-3 text-sm font-bold uppercase tracking-wide">
                {{ session('success') }}
            </div>
            <button type="button" onclick="document.getElementById('alert-success').style.display='none'" class="ml-auto -mx-1.5 -my-1.5 bg-emerald-50 text-emerald-500 rounded-lg focus:ring-2 focus:ring-emerald-400 p-1.5 hover:bg-emerald-100 inline-flex items-center justify-center h-8 w-8">
                <span class="sr-only">Fermer</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
</div>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-2xl p-8">
                <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Titre</label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}" 
                            class="w-full border-gray-300 rounded-xl focus:ring-indigo-500" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Catégorie</label>
                            <select name="category_id" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Statut</label>
                            <select name="status" class="w-full border-gray-300 rounded-xl focus:ring-indigo-500">
                                @foreach(['À faire', 'En cours', 'Terminé'] as $status)
                                    <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                        <textarea name="description" rows="4" 
                            class="w-full border-gray-300 rounded-xl focus:ring-indigo-500">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="flex justify-end gap-4 pt-6 border-t">
                        <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-slate-600">Annuler</a>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>