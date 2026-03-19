<x-app-layout>
    <div class="p-6 lg:p-10 bg-slate-50/50 min-h-screen">
        <div class="max-w-5xl mx-auto flex items-center justify-between mb-8">
            <a href="{{ route('users.index') }}" class="group flex items-center bg-white px-5 py-2.5 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all">
                <svg class="w-5 h-5 text-indigo-600 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="text-sm font-bold text-slate-600">Retour à l'équipe</span>
            </a>
            
            <div class="flex gap-3">
                 <span class="px-4 py-2 bg-white rounded-2xl shadow-sm border border-slate-100 text-[10px] font-black tracking-[0.2em] uppercase text-slate-400">
                    ID Profil: #00{{ $user->id }}
                </span>
            </div>
        </div>

        <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-indigo-100/20 border border-slate-100 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 -z-0"></div>
                    
                    <div class="relative z-10">
                        <div class="inline-flex p-1.5 bg-white rounded-3xl shadow-lg mb-4">
                            <div class="w-24 h-24 bg-gradient-to-tr from-indigo-600 to-violet-600 rounded-[1.5rem] flex items-center justify-center text-3xl font-black text-white shadow-inner">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        </div>
                        
                        <h2 class="text-2xl font-black text-slate-800 leading-tight">{{ $user->name }}</h2>
                        <p class="text-indigo-600 font-medium text-sm mb-4">{{ $user->email }}</p>
                        
                        <div class="inline-block px-4 py-1.5 rounded-full text-[10px] font-bold tracking-widest uppercase {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $user->role }}
                        </div>
                    </div>
                </div>

                <div class="bg-[#1e293b] rounded-[2rem] p-6 text-white shadow-2xl shadow-slate-900/20">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-4">Aperçu d'activité</p>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-300">Tâches complétées</span>
                            <span class="text-lg font-bold text-emerald-400">24</span>
                        </div>
                        <div class="w-full bg-slate-700 rounded-full h-1.5">
                            <div class="bg-emerald-400 h-1.5 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Date d'arrivée</p>
                        <p class="text-lg font-bold text-slate-700">{{ $user->created_at->format('d F, Y') }}</p>
                    </div>

                    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Dernière Connexion</p>
                        <p class="text-lg font-bold text-slate-700">Il y a 2 heures</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-800 mb-6">Paramètres de compte</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <div>
                                <p class="text-sm font-bold text-slate-700">Statut du compte</p>
                                <p class="text-xs text-slate-400">Le compte est actuellement actif et vérifié.</p>
                            </div>
                            <span class="w-3 h-3 bg-emerald-500 rounded-full shadow-[0_0_10px_rgba(16,185,129,0.5)]"></span>
                        </div>

                        @if(auth()->id() !== $user->id)
                        <div class="pt-6 mt-6 border-t border-slate-100">
                            <p class="text-xs font-bold text-red-400 uppercase tracking-widest mb-4">Zone de danger</p>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Cette action est irréversible. Supprimer ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full md:w-auto bg-red-50 text-red-600 hover:bg-red-600 hover:text-white px-8 py-3 rounded-2xl font-bold text-sm transition-all duration-300">
                                    Révoquer l'accès de ce membre
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>