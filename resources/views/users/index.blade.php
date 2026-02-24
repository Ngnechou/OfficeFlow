<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Gestion des Utilisateurs</h1>

        <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-50 dark:bg-slate-900">
                    <tr>
                        <th class="px-6 py-4">Nom</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Rôle Actuel</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                    @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 font-medium">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-slate-500">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 text-slate-700' }}">
                                {{ strtoupper($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('users.updateRole', $user) }}" method="POST" class="flex gap-2">
                                @csrf
                                @method('PATCH')
                                <select name="role" onchange="this.form.submit()" class="text-sm rounded-lg border-slate-200 dark:bg-slate-700 dark:text-white">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>