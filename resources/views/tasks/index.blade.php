<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">📋 Mes Tâches</h2>
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-bold text-sm hover:bg-indigo-700 transition shadow-sm">
                + Nouvelle tâche
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div id="alert-success" class="mb-6 flex items-center p-4 text-emerald-800 bg-emerald-50 border border-emerald-100 rounded-2xl shadow-sm">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <div class="text-sm font-bold uppercase">{{ session('success') }}</div>
                    <button type="button" onclick="document.getElementById('alert-success').remove()" class="ml-auto text-emerald-500 hover:text-emerald-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif

            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-8 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
                
                <form action="{{ route('tasks.index') }}" method="GET" class="relative flex-1 max-w-md">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Rechercher une mission..." 
                        class="w-full pl-11 pr-10 py-2.5 bg-slate-50 border-transparent rounded-xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all text-sm">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    @if(request('search'))
                        <a href="{{ route('tasks.index') }}" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-red-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    @endif
                </form>

                <div class="flex items-center gap-2 overflow-x-auto">
                    @php $currentStatus = request('status'); @endphp
                    
                    <a href="{{ route('tasks.index', request()->except('status')) }}" 
                        class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-bold uppercase transition-all {{ !$currentStatus ? 'bg-indigo-600 text-white shadow-md shadow-indigo-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                        Tous
                    </a>

                    <a href="{{ route('tasks.index', array_merge(request()->query(), ['status' => 'À faire'])) }}" 
                        class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-bold uppercase transition-all {{ $currentStatus == 'À faire' ? 'bg-orange-500 text-white shadow-md shadow-orange-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                        À faire
                    </a>

                    <a href="{{ route('tasks.index', array_merge(request()->query(), ['status' => 'En cours'])) }}" 
                        class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-bold uppercase transition-all {{ $currentStatus == 'En cours' ? 'bg-blue-500 text-white shadow-md shadow-blue-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                        En cours
                    </a>

                    <a href="{{ route('tasks.index', array_merge(request()->query(), ['status' => 'Terminé'])) }}" 
                        class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-bold uppercase transition-all {{ $currentStatus == 'Terminé' ? 'bg-emerald-500 text-white shadow-md shadow-emerald-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                        Terminés
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-sm border border-slate-200 rounded-2xl overflow-hidden">
                <table class="min-w-full divide-y divide-slate-100">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Mission</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Catégorie</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse ($tasks as $task)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-900">{{ $task->title }}</div>
                                <div class="text-xs text-slate-500 truncate max-w-[200px]">{{ $task->description }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded-md border border-indigo-100 text-[10px] font-bold uppercase">
                                    {{ $task->category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">
                                {{ $task->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase
                                    {{ $task->status == 'Terminé' ? 'bg-emerald-100 text-emerald-700' : 
                                       ($task->status == 'En cours' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700') }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('tasks.edit', $task) }}" class="p-1 text-slate-400 hover:text-indigo-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-1 text-slate-400 hover:text-red-500" onclick="return confirm('Supprimer cette tâche ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="p-4 bg-slate-50 rounded-full mb-4">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <p class="text-slate-500 font-medium">Aucune mission trouvée</p>
                                    <a href="{{ route('tasks.index') }}" class="mt-2 text-indigo-600 hover:underline text-sm font-bold">Réinitialiser les filtres</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($tasks->hasPages())
                    <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100">
                        {{ $tasks->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
            
            <div class="mt-4 text-xs text-slate-400 text-center font-medium">
                Affichage de {{ $tasks->count() }} résultat(s) sur un total de {{ $tasks->total() }}
            </div>
        </div>
    </div>
</x-app-layout>