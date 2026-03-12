<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name') }}</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#1e3a8a',
                        accent: '#60a5fa',
                    },
                    fontFamily: {
                        'sans': ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1e40af;
            --secondary: #1e3a8a;
            --accent: #60a5fa;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }
        
        .nav-glass {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(15px);
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #f0f4ff 0%, #f8fafc 50%, #e0e7ff 100%);
        }
        
        .feature-gradient {
            background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%);
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(30, 64, 175, 0.08);
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
        }
        
        .btn-secondary {
            background: white;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            border-color: var(--primary);
            box-shadow: 0 5px 15px rgba(30, 64, 175, 0.1);
        }
        
        .cta-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }
        
        .testimonial-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%);
        }
        
        .footer-bg {
            background: #0f172a;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-text {
                font-size: 2.5rem;
            }
            
            .section-padding {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }
        }
    </style>
</head>
<body class="bg-white text-slate-900">
    <!-- Navigation -->
    <nav class="nav-glass fixed w-full z-50 border-b border-slate-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-700">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
</svg>

                </div>
                <span class="font-bold text-xl tracking-tight text-indigo-600">OfficeFlow</span>
            </div>
            
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden text-slate-700 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
            
            <!-- Desktop menu -->
            <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="#services" class="hover:text-primary transition-all duration-300">Services</a>
                <a href="#features" class="hover:text-primary transition-all duration-300">Fonctionnalités</a>
                <a href="#about" class="hover:text-primary transition-all duration-300">À propos</a>
                <a href="#testimonials" class="hover:text-primary transition-all duration-300">Témoignages</a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-primary text-white px-6 py-2.5 rounded-full shadow-md">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-slate-900 transition-colors">Connexion</a>
                    <a href="{{ route('register') }}" class="btn-primary text-white px-6 py-2.5 rounded-full shadow-md">S'inscrire</a>
                @endauth
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-slate-100 px-6 py-4">
            <div class="flex flex-col gap-4">
                <a href="#services" class="py-2 hover:text-primary transition-colors">Services</a>
                <a href="#features" class="py-2 hover:text-primary transition-colors">Fonctionnalités</a>
                <a href="#about" class="py-2 hover:text-primary transition-colors">À propos</a>
                <a href="#testimonials" class="py-2 hover:text-primary transition-colors">Témoignages</a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-primary text-white px-4 py-2.5 rounded-full text-center">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="py-2 hover:text-primary transition-colors">Connexion</a>
                    <a href="{{ route('register') }}" class="btn-primary text-white px-4 py-2.5 rounded-full text-center">S'inscrire</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient pt-32 pb-20 px-4 sm:px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center gap-2 bg-blue-50 text-primary text-sm font-semibold px-4 py-2 rounded-full mb-6">
                    <i class="fas fa-star"></i>
                    <span>Solution N°1 pour les professionnels</span>
                </div>
                
                <h1 class="hero-text text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900 mb-6">
                    L'excellence administrative 
                    <span class="text-primary block">réinventée.</span>
                </h1>
                
                <p class="text-slate-600 text-lg mb-10 max-w-xl">
                    Une plateforme intuitive et sécurisée pour gérer, suivre et valider vos missions administratives en temps réel. Conçue pour les professionnels exigeants.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('register') }}" class="btn-primary text-white px-8 py-4 rounded-xl font-bold shadow-xl text-center">
                        Démarrer gratuitement
                    </a>
                    <a href="#services" class="btn-secondary text-slate-800 px-8 py-4 rounded-xl font-bold text-center">
                        <i class="fas fa-play-circle mr-2"></i> Voir la démo
                    </a>
                </div>
                
                <div class="mt-10 flex items-center gap-6">
                    <div class="flex items-center">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 bg-blue-500 rounded-full border-2 border-white"></div>
                            <div class="w-8 h-8 bg-green-500 rounded-full border-2 border-white"></div>
                            <div class="w-8 h-8 bg-purple-500 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="ml-3 text-sm text-slate-600">+500 professionnels</span>
                    </div>
                    <div class="h-6 w-px bg-slate-200"></div>
                    <div class="flex items-center">
                        <i class="fas fa-shield-check text-green-500 text-lg mr-2"></i>
                        <span class="text-sm text-slate-600">Certifié sécurité</span>
                    </div>
                </div>
            </div>
            
            <div class="relative" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
                <div class="absolute -top-10 -right-10 w-80 h-80 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-8 border-white">
                   <div class="relative" data-aos="zoom-in" data-aos-duration="1200">
    <div class="bg-indigo-600/5 absolute -inset-10 rounded-full blur-3xl"></div>
    
    <img src="{{ asset('images/la-canadienne.jpg.jpg') }}" 
         alt="Accueil La Canadienne" 
         class="relative rounded-3xl shadow-2xl border border-white w-full object-cover h-[400px]">
</div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6 text-white">
                        <h3 class="font-bold text-lg">Tableau de bord personnalisé</h3>
                        <p class="text-sm opacity-90">Toutes vos missions en un seul endroit</p>
                    </div>
                </div>
                
                <!-- Floating elements -->
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-slate-100" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-line text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900">+45%</p>
                            <p class="text-xs text-slate-500">Productivité</p>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -top-6 -right-6 bg-white p-4 rounded-2xl shadow-xl border border-slate-100" data-aos="fade-up" data-aos-delay="600">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-blue-600"></i>
                        </div>
                        <div>
                            <p class="font-bold text-slate-900">-30%</p>
                            <p class="text-xs text-slate-500">Temps de gestion</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
<div class="py-20 bg-gradient-to-b from-slate-50 to-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-center gap-4 mb-12">
            <div class="h-px w-12 bg-slate-200"></div>
            <p class="text-slate-500 text-xs uppercase tracking-[0.2em] font-bold">Ils nous font confiance</p>
            <div class="h-px w-12 bg-slate-200"></div>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-6 md:gap-10">
            
            <div class="flex items-center px-6 py-3 rounded-2xl bg-transparent hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 group cursor-default border border-transparent hover:border-slate-100 grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-600 group-hover:text-indigo-600 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                </svg>
                <span class="ml-3 font-extrabold text-slate-600 group-hover:text-slate-900 tracking-tight">Corporate</span>
            </div>

            <div class="flex items-center px-6 py-3 rounded-2xl bg-transparent hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 group cursor-default border border-transparent hover:border-slate-100 grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-600 group-hover:text-amber-500 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25L12 3.456 3 8.25 12 13.044 21 8.25z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 13.044v9.706L21 12.91V8.25l-9 4.794zM12 13.044L3 8.25v4.66l9 9.84v-9.706z" />
                </svg>
                <span class="ml-3 font-extrabold text-slate-600 group-hover:text-slate-900 tracking-tight">Luxe</span>
            </div>

            <div class="flex items-center px-6 py-3 rounded-2xl bg-transparent hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 group cursor-default border border-transparent hover:border-slate-100 grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-600 group-hover:text-blue-600 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75L4.5 21.375l1.315-4.594c.168-.588.583-1.071 1.135-1.325a12.901 12.901 0 0 1 10.1 0c.552.254.967.737 1.135 1.325L19.5 21.375l-3.315-.375a12.894 12.894 0 0 0-4.185-.75Z" />
                </svg>
                <span class="ml-3 font-extrabold text-slate-600 group-hover:text-slate-900 tracking-tight">Juridique</span>
            </div>

            <div class="flex items-center px-6 py-3 rounded-2xl bg-transparent hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 group cursor-default border border-transparent hover:border-slate-100 grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-600 group-hover:text-red-500 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
                <span class="ml-3 font-extrabold text-slate-600 group-hover:text-slate-900 tracking-tight">Santé</span>
            </div>

            <div class="flex items-center px-6 py-3 rounded-2xl bg-transparent hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 group cursor-default border border-transparent hover:border-slate-100 grayscale opacity-60 hover:opacity-100 hover:grayscale-0 transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-600 group-hover:text-emerald-600 transition-colors">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147L12 14.243l7.74-4.096a.75.75 0 0 1 1.026.68v6.75a.75.75 0 0 1-.397.662l-8.25 4.5a.75.75 0 0 1-.706 0l-8.25-4.5a.75.75 0 0 1-.397-.662V10.827a.75.75 0 0 1 1.026-.68z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25L12 13.044 3 8.25 12 3.456 21 8.25z" />
                </svg>
                <span class="ml-3 font-extrabold text-slate-600 group-hover:text-slate-900 tracking-tight">Éducation</span>
            </div>

        </div>
    </div>
</div>
    <!-- Services Section -->
    <section id="services" class="section-padding py-20 px-4 sm:px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-900">Nos Services</h2>
                <div class="h-1 w-24 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-slate-600 max-w-2xl mx-auto text-lg">
                    Une suite complète d'outils conçue pour simplifier la gestion administrative des professionnels
                </p>
            </div>
            
           <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="p-8 border border-slate-100 rounded-3xl card-hover bg-white" data-aos="fade-up" data-aos-delay="100">
        <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6 text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
            </svg>
        </div>
        <h3 class="text-xl font-bold mb-3 text-slate-900">Gestion de dossiers</h3>
        <p class="text-slate-500 text-sm leading-relaxed">
            Organisez et archivez vos dossiers par catégories, avec un accès rapide et sécurisé.
        </p>
    </div>

    <div class="p-8 border border-slate-100 rounded-3xl card-hover bg-white" data-aos="fade-up" data-aos-delay="200">
        <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center mb-6 text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/xl" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 3h.008v.008H12V18Zm-3-3h.008v.008H9V15Zm0 3h.008v.008H9V18Zm6-3h.008v.008H15V15Zm0 3h.008v.008H15V18Z" />
            </svg>
        </div>
        <h3 class="text-xl font-bold mb-3 text-slate-900">Planning intelligent</h3>
        <p class="text-slate-500 text-sm leading-relaxed">
            Planifiez vos missions et rendez-vous avec un système de rappels automatisés.
        </p>
    </div>

    <div class="p-8 border border-slate-100 rounded-3xl card-hover bg-white" data-aos="fade-up" data-aos-delay="300">
        <div class="w-14 h-14 bg-emerald-50 rounded-xl flex items-center justify-center mb-6 text-emerald-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
            </svg>
        </div>
        <h3 class="text-xl font-bold mb-3 text-slate-900">Analyses détaillées</h3>
        <p class="text-slate-500 text-sm leading-relaxed">
            Suivez vos performances avec des statistiques en temps réel et des rapports personnalisés.
        </p>
    </div>

    <div class="p-8 border border-slate-100 rounded-3xl card-hover bg-white" data-aos="fade-up" data-aos-delay="400">
        <div class="w-14 h-14 bg-purple-50 rounded-xl flex items-center justify-center mb-6 text-purple-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
            </svg>
        </div>
        <h3 class="text-xl font-bold mb-3 text-slate-900">Sécurité maximale</h3>
        <p class="text-slate-500 text-sm leading-relaxed">
            Vos données sont chiffrées et chaque utilisateur a un accès contrôlé selon son rôle.
        </p>
    </div>
</div>
    </section>

    <!-- Features Section -->
    <section id="features" class="feature-gradient py-20 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-slate-900">
                        Une interface pensée pour <span class="text-primary">l'efficacité</span>
                    </h2>
                    <p class="text-slate-600 mb-8 text-lg">
                        La Canadienne offre une expérience utilisateur fluide et intuitive, conçue pour réduire le temps passé sur les tâches administratives.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Navigation intuitive</h4>
                                <p class="text-slate-600 text-sm">Trouvez l'information dont vous avez besoin en quelques clics.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-bolt text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Chargement rapide</h4>
                                <p class="text-slate-600 text-sm">Une plateforme optimisée pour une réactivité maximale.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-mobile-alt text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Design responsive</h4>
                                <p class="text-slate-600 text-sm">Accédez à vos données depuis n'importe quel appareil.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div data-aos="fade-left" class="relative">
                    <div class="bg-white rounded-3xl p-2 shadow-2xl border border-slate-100">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=1000" 
                             alt="Interface dashboard" class="rounded-2xl w-full h-auto">
                    </div>
                    
                    <!-- Floating element -->
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-xl border border-slate-100 max-w-xs" data-aos="fade-up" data-aos-delay="400">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-bar text-white text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">Statistiques en direct</p>
                                <p class="text-xs text-slate-500">Mises à jour automatiques</p>
                            </div>
                        </div>
                        <p class="text-slate-600 text-sm">Visualisez l'avancement de vos projets en temps réel avec des graphiques interactifs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonial-bg py-20 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-900">Ce que disent nos utilisateurs</h2>
                <div class="h-1 w-24 bg-primary mx-auto rounded-full mb-6"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-3xl shadow-md border border-slate-100" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="font-bold text-primary text-lg">sc</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">sado cabrel</h4>
                            <p class="text-slate-500 text-sm">Directrice Administrative</p>
                        </div>
                    </div>
                    <p class="text-slate-600 italic mb-6">
                        "La Canadienne a transformé notre gestion administrative. Nous avons réduit de 40% le temps passé sur les tâches répétitives."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-3xl shadow-md border border-slate-100" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <span class="font-bold text-green-600 text-lg">PD</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">bokou laurenne </h4>
                            <p class="text-slate-500 text-sm">secretaire</p>
                        </div>
                    </div>
                    <p class="text-slate-600 italic mb-6">
                        "La sécurité des données est exceptionnelle. Je peux confier tous mes dossiers sensibles à cette plateforme sans inquiétude."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-3xl shadow-md border border-slate-100" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <span class="font-bold text-purple-600 text-lg">SC</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">ALAIN MOUNDI</h4>
                            <p class="text-slate-500 text-sm">Gérante d'agence</p>
                        </div>
                    </div>
                    <p class="text-slate-600 italic mb-6">
                        "L'interface est tellement intuitive que mon équipe a été opérationnelle en moins d'une journée. Un gain de temps considérable."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto">
            <div class="cta-gradient rounded-[2.5rem] p-8 md:p-12 lg:p-16 text-center relative overflow-hidden" data-aos="zoom-in">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
                        Prêt à transformer votre gestion administrative ?
                    </h2>
                    <p class="text-blue-100 text-lg md:text-xl mb-10 max-w-3xl mx-auto">
                        Rejoignez plus de 500 professionnels qui font déjà confiance à La Canadienne pour optimiser leur productivité.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="bg-white text-primary px-10 py-4 rounded-xl font-bold hover:bg-blue-50 transition-all duration-300 shadow-lg">
                            Essai gratuit 30 jours
                        </a>
                        <a href="#contact" class="bg-transparent border-2 border-white text-white px-10 py-4 rounded-xl font-bold hover:bg-white/10 transition-all duration-300">
                            Contacter un expert
                        </a>
                    </div>
                    
                    <p class="text-blue-100 text-sm mt-8">
                        Aucune carte bancaire requise. Annulation à tout moment.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-bg text-white py-12 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-10">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                            <i class="fas fa-leaf text-primary text-lg"></i>
                        </div>
                        <span class="font-bold text-xl">OfficeFlow</span>
                    </div>
                    <p class="text-slate-300 text-sm">
                        La solution d'excellence pour la gestion administrative des professionnels.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-bold text-lg mb-6">Navigation</h4>
                    <ul class="space-y-3 text-slate-300">
                        <li><a href="#services" class="hover:text-white transition-colors">Services</a></li>
                        <li><a href="#features" class="hover:text-white transition-colors">Fonctionnalités</a></li>
                        <li><a href="#about" class="hover:text-white transition-colors">À propos</a></li>
                        <li><a href="#testimonials" class="hover:text-white transition-colors">Témoignages</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold text-lg mb-6">Légal</h4>
                    <ul class="space-y-3 text-slate-300">
                        <li><a href="#" class="hover:text-white transition-colors">Mentions légales</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Confidentialité</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">CGU</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Cookies</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold text-lg mb-6">Contact</h4>
                    <ul class="space-y-3 text-slate-300">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope text-primary"></i>
                            <span>contact@OfficeFlow.com</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone text-primary"></i>
                            <span>+237 680 442 077</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                            <span>bafoussam, Cameroun</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-slate-700 flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-400 text-sm">&copy; {{ date('Y') }} LAURENNE BOKOU. Tous droits réservés.</p>
                
<div class="flex gap-4 mt-4 md:mt-0">
  <a href="https://wa.me/680442077" target="_blank" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center text-white hover:bg-emerald-500 transition-all duration-300">
    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.63 1.438h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path>
    </svg>
</a>

    <a href="https://www.linkedin.com/in/laurenne-grace-bokou-127b34370/" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-all duration-300">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
        </svg>
    </a>

    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center text-white hover:bg-blue-600 transition-all duration-300">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
        </svg>
    </a>
</div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            once: true,
            mirror: false,
            offset: 100
        });
        
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            
            // Toggle icon
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.add('hidden');
                const icon = document.querySelector('#mobile-menu-button i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>