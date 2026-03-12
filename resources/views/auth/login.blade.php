<x-guest-layout>
    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <!-- Partie gauche : Formulaire de connexion (fond blanc) -->
        <div class="flex-1 flex items-center justify-center p-6 lg:p-12 bg-white">
            <div class="w-full max-w-md">
                <!-- Logo et titre -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 rounded-xl shadow-sm mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800">Connectez‑vous à <span class="text-indigo-600">OfficeFlow</span></h2>
                    <p class="text-slate-500 mt-1 text-sm">Gérez, suivez et validez vos missions en toute simplicité</p>
                </div>

                <!-- Message de session -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">
                            Adresse e-mail professionnelle
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="block w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="prenom.nom@cabinet.fr">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-1">
                            Mot de passe
                        </label>
                        <input id="password" type="password" name="password" required
                            class="block w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Options supplémentaires -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="w-4 h-4 border-slate-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-slate-600">Se souvenir de moi</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit" class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-sm transition">
                        Se connecter
                    </button>

                    <!-- Lien d'inscription -->
                    <p class="text-center text-sm text-slate-500">
                        Pas encore de compte ?
                        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                            Créer un compte
                        </a>
                    </p>
                </form>
            </div>
        </div>

        <!-- Partie droite : message et statistiques (fond indigo clair) -->
          <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-indigo-100 to-indigo-50 p-12 items-center justify-center relative overflow-hidden">
            <div class="max-w-md text-center">
                <h3 class="text-3xl font-bold text-indigo-900 mb-3">OfficeFlow</h3>
                <p class="text-indigo-700 text-lg leading-relaxed mb-6">
                    Une plateforme intuitive et sécurisée pour gérer, suivre et valider vos  missions administratives en temps réel.
                </p>
                <p class="text-indigo-600 font-medium mb-8">Conçue pour les professionnels exigeants.</p>

                <!-- Statistiques simples -->
                <div class="grid grid-cols-2 gap-4 max-w-sm mx-auto">
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <div class="text-2xl font-bold text-indigo-700">+500</div>
                        <div class="text-xs text-slate-500">professionnels</div>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <div class="text-2xl font-bold text-indigo-700">+45%</div>
                        <div class="text-xs text-slate-500">de productivité</div>
                    </div>
                </div>

                <!-- Label de confiance -->
                <div class="mt-6 flex items-center justify-center gap-2 text-indigo-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-medium">Certifié sécurité</span>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>