<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-slate-800 dark:text-white">Gestion de l'Équipe</h1>
            <span class="bg-indigo-50 text-indigo-700 px-4 py-2 rounded-xl text-sm font-semibold border border-indigo-100">
                {{ $users->count() }} Membres
            </span>
        </div>

        <div class="bg-white dark:bg-slate-800 rounded-[2rem] shadow-sm border border-slate-100 dark:border-slate-700 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50 dark:bg-slate-900/50">
                    <tr>
                        <th class="px-6 py-4 text-slate-400 font-semibold text-sm uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-4 text-slate-400 font-semibold text-sm uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-slate-400 font-semibold text-sm uppercase tracking-wider">Rôle Actuel</th>
                        <th class="px-6 py-4 text-slate-400 font-semibold text-sm uppercase tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                    @foreach($users as $user)
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-700/50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-700 dark:text-slate-200">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-slate-500 dark:text-slate-400">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-black tracking-widest 
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700 border border-purple-200' : 'bg-slate-100 text-slate-500 border border-slate-200' }}">
                                {{ strtoupper($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">
                                
                                @if(auth()->id() !== $user->id) {{-- On ne change pas son propre rôle --}}
                                <form action="{{ route('users.updateRole', $user) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" onchange="this.form.submit()" 
                                        class="text-xs rounded-xl border-slate-200 bg-slate-50 focus:ring-indigo-500 py-1 pl-2 pr-8 font-semibold text-slate-600 cursor-pointer hover:bg-white transition">
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>👤 Utilisateur</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>⚡ Admin</option>
                                    </select>
                                </form>
                                @else
                                <div class="text-[10px] font-bold text-indigo-400 uppercase bg-indigo-50 px-2 py-1 rounded-lg">C'est vous</div>
                                @endif

                                @if($user->role !== 'admin')
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer définitivement cet utilisateur ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors" title="Supprimer">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <div class="p-2 text-slate-200" title="Un administrateur ne peut pas être supprimé">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>