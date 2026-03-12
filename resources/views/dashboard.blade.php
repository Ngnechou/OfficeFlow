<x-app-layout>
    <div class="p-6 space-y-6">
        
        <h1 class="text-2xl font-bold">
            Tableau de Bord 
            <span class="text-sm font-normal text-slate-500">
                ({{ Auth::user()->role === 'admin' ? 'Mode Administrateur' : 'Mode Utilisateur' }})
            </span>
        </h1>

        @include('partials.stats_cards')

        @if(Auth::user()->role === 'admin')
            <div class="mt-8">
                @include('partials.admin_content')
            </div>
        @else
        
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Mes Tâches Récentes</h2>
                @include('partials.user_content')
            </div>
        @endif

    </div>
</x-app-layout>