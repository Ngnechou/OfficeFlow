<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-indigo-500">
        <p class="text-slate-500 text-xs font-bold uppercase">Total Dossiers</p>
        <h3 class="text-3xl font-bold">{{ $stats['total'] }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-amber-500">
        <p class="text-slate-500 text-xs font-bold uppercase">À Faire</p>
        <h3 class="text-3xl font-bold">{{ $stats['a_faire'] }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500">
        <p class="text-slate-500 text-xs font-bold uppercase">En Cours</p>
        <h3 class="text-3xl font-bold">{{ $stats['en_cours'] }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-emerald-500">
        <p class="text-slate-500 text-xs font-bold uppercase">Terminés</p>
        <h3 class="text-3xl font-bold">{{ $stats['terminees'] }}</h3>
    </div>
</div>