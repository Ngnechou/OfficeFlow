<div class="">
    <div>
  <canvas id="myChart"></canvas>
</div>
    <div>
  <canvas id="myCircle"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Graphique 1 - Bar
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
        backgroundColor: [
          'red','blue','yellow','green','purple','orange'
        ]
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Graphique 2 - Pie
  const ctx1 = document.getElementById('myCircle');

  new Chart(ctx1, {
    type: 'pie',
    data: {
      labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
      datasets: [{
        label: 'Dataset 1',
        data: [30, 20, 25, 15, 10],
        backgroundColor: [
          'red',
          'orange',
          'yellow',
          'green',
          'blue'
        ]
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Diagramme circulaire'
        }
      }
    }
  });
</script>
</div>