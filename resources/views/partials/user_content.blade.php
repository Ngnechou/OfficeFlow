<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse($recentTasks as $task)
    <div class="bg-white dark:bg-slate-800 p-5 rounded-2xl border border-slate-100 dark:border-slate-700 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-3">
            <span class="text-xs font-bold text-indigo-600 uppercase">{{ $task->category->name ?? 'Général' }}</span>
            <span class="text-xs text-slate-400">{{ $task->created_at->diffForHumans() }}</span>
        </div>
        <h4 class="font-bold text-slate-800 dark:text-white mb-2">{{ $task->title }}</h4>
        <div class="flex justify-between items-center mt-4">
            <span class="text-sm text-slate-500 italic">{{ $task->status }}</span>
            <a href="#" class="text-indigo-600 text-sm font-semibold hover:underline">Détails →</a>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-10 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
        <p class="text-slate-500">Vous n'avez pas encore de tâches. <a href="/tasks/create" class="text-indigo-600 font-bold">Créez-en une !</a></p>
    </div>
    @endforelse
</div>