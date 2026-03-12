<div class="space-y-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700">
            <h3 class="text-center font-bold text-slate-700 dark:text-slate-200 mb-4">Statistiques des tâches</h3>
            <div class="h-[300px]">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700">
            <h3 class="text-center font-bold text-slate-700 dark:text-slate-200 mb-4">Répartition par statut</h3>
            <div class="h-[300px]">
                <canvas id="myCircle"></canvas>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 overflow-hidden">
        <div class="p-6 border-b border-slate-50 dark:border-slate-700 flex justify-between items-center">
            <h3 class="font-bold text-lg text-slate-800 dark:text-white">Activités récentes de l'équipe</h3>
            <span class="bg-indigo-100 text-indigo-600 text-xs font-bold px-3 py-1 rounded-full">
                {{ $stats['users_count'] }} Membres
            </span>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 dark:bg-slate-900/50">
                    <tr>
                        <th class="px-6 py-4 text-slate-500 font-semibold text-sm">Utilisateur</th>
                        <th class="px-6 py-4 text-slate-500 font-semibold text-sm">Tâche</th>
                        <th class="px-6 py-4 text-slate-500 font-semibold text-sm">Catégorie</th>
                        <th class="px-6 py-4 text-slate-500 font-semibold text-sm">Statut</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 dark:divide-slate-700">
                    @foreach($recentTasks as $task)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold">
                                    {{ strtoupper(substr($task->user->name, 0, 2)) }}
                                </div>
                                <span class="font-medium text-slate-700 dark:text-slate-200">{{ $task->user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">{{ $task->title }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-xs rounded-md">
                                {{ $task->category->name ?? 'Aucune' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $color = $task->status === 'Terminé' ? 'emerald' : ($task->status === 'En cours' ? 'blue' : 'amber');
                            @endphp
                            <span class="inline-flex items-center gap-1.5 py-1 px-2 rounded-full text-xs font-medium bg-{{ $color }}-100 text-{{ $color }}-700">
                                {{ $task->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Palette de couleurs partagée
    const colors = ['#8b5cf6','#f59e0b','#3b82f6', '#10b981']; // Blue, Green, Purple, Orange

    // 1. Graphique Bar (Synchronisé avec ton Controller)
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total dossiers', 'À FAIRE', 'En cours', 'Terminé'],
            datasets: [{
                label: '# tâches',
                data: [
                    {{ $stats['total'] }}, 
                    {{ $stats['a_faire'] }}, 
                    {{ $stats['en_cours'] }}, 
                    {{ $stats['terminees'] }}
                ],
                backgroundColor: colors,
                borderWidth: 0,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [5, 5] } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Graphique Pie (Répartition proportionnelle)
    const ctx1 = document.getElementById('myCircle');
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['À FAIRE', 'En cours', 'Terminé'],
            datasets: [{
                data: [
                    {{ $stats['a_faire'] }}, 
                    {{ $stats['en_cours'] }}, 
                    {{ $stats['terminees'] }}
                ],
                backgroundColor: ['#f59e0b','#3b82f6', '#10b981'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>