<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-slate-50 py-12 px-4">
        <div class="max-w-md w-full bg-white p-10 rounded-[2.5rem] shadow-xl shadow-indigo-100/50 border border-slate-100">
            
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-50 mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">OfficeFlow</h2>
                <p class="mt-2 text-slate-500 font-medium">L'excellence administrative réinventée.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <x-input-label for="name" :value="__('Nom complet')" class="text-slate-600 font-semibold ml-1" />
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                            class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border-slate-200 text-slate-900 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 transition-all placeholder-slate-400"
                            placeholder="Ex: Jean Dupont" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Adresse Email')" class="text-slate-600 font-semibold ml-1" />
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 group-focus-within:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                            class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border-slate-200 text-slate-900 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 transition-all placeholder-slate-400"
                            placeholder="jean@officeflow.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="grid grid-cols-1 gap-5">
                    <div class="space-y-2">
                        <x-input-label for="password" :value="__('Mot de passe')" class="text-slate-600 font-semibold ml-1" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required 
                                class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border-slate-200 text-slate-900 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 transition-all placeholder-slate-400"
                                placeholder="••••••••" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="text-slate-600 font-semibold ml-1" />
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required 
                                class="block w-full pl-11 pr-4 py-3.5 bg-slate-50 border-slate-200 text-slate-900 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 transition-all placeholder-slate-400"
                                placeholder="••••••••" />
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex flex-col items-center gap-6">
                    <button type="submit" 
                        class="w-full bg-[#1e3a8a] hover:bg-[#1e40af] text-white font-bold py-4 rounded-2xl shadow-lg shadow-blue-900/20 transition-all transform hover:-translate-y-1 active:scale-[0.98]">
                        {{ __('Démarrer gratuitement') }}
                    </button>

                    <p class="text-slate-500 text-sm">
                        Déjà inscrit ? 
                        <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline ml-1">Connectez-vous</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>