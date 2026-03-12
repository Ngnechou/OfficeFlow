

<div class="bg-white dark:bg-slate-800 p-6 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="font-bold text-lg text-slate-800 dark:text-white">Évolution de l'activité</h3>
        <span class="text-xs text-slate-400">7 derniers jours</span>
    </div>
    <div class="h-[300px]">
        <canvas id="evolutionChart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // On attend que la page soit chargée
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('evolutionChart');
        
        // Sécurité : on vérifie si le canvas existe vraiment
        if (canvas) {
            const ctxEvolution = canvas.getContext('2d');
            
            const gradient = ctxEvolution.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(79, 70, 229, 0.2)');
            gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');

            new Chart(ctxEvolution, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels) !!}, 
             datasets: [{
    label: 'Tâches créées',
    data: {!! json_encode($chartValues) !!}, 
    fill: true,
    // Dégradé sous la courbe
    backgroundColor: gradient, 
    // Couleur de la ligne (Indigo moderne)
    borderColor: '#6366f1', 
    borderWidth: 4,
    // Lissage de la courbe
    tension: 0.45, 
    // Style des points (cercles blancs avec bordure colorée)
    pointRadius: 6,
    pointHitRadius: 10,
    pointBackgroundColor: '#ffffff',
    pointBorderColor: '#6366f1',
    pointBorderWidth: 2,
    // Effet au survol
    pointHoverRadius: 8,
    pointHoverBackgroundColor: '#6366f1',
    pointHoverBorderColor: '#ffffff',
    pointHoverBorderWidth: 3
}]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0, 0, 0, 0.05)' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        }
    });
</script>

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
            <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 text-sm font-semibold hover:underline">Détails →</a>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-10 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
        <p class="text-slate-500">Vous n'avez pas encore de tâches. <a href="/tasks/create" class="text-indigo-600 font-bold">Créez-en une !</a></p>
    </div>
    @endforelse
</div>
