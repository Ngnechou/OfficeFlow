<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-slate-900">
        <div class="min-h-screen flex">
            
            <aside class="w-64 bg-white border-r border-gray-200 fixed h-full z-40 hidden lg:flex flex-col">
                <div class="p-6 flex items-center border-b border-gray-50">
                    <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center mr-3 shadow-sm text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147L12 14.243l7.74-4.096a.75.75 0 011.026.68v6.75a.75.75 0 01-.397.662l-8.25 4.5a.75.75 0 01-.706 0l-8.25-4.5a.75.75 0 01-.397-.662V10.827a.75.75 0 011.026-.68z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25L12 13.044 3 8.25 12 3.456 21 8.25z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold tracking-tight text-slate-800">La Canadienne</h1>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 mb-2">Principal</p>


                                   <a href="{{ route('welcome') }}" 
                       class="flex items-center px-3 py-2.5 {{ request()->routeIs('welcome') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-gray-50 hover:text-slate-900' }} rounded-lg transition-all duration-200 font-medium group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3 {{ request()->routeIs('welcome') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Accueil
                    </a>
                    
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center px-3 py-2.5 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-gray-50 hover:text-slate-900' }} rounded-lg transition-all duration-200 font-medium group">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" 
         class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
        <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z" />
    </svg>

                        Dashboard
                    </a>


                                  
     


                    @if(Auth::user()->role === 'admin')
                    <a href="{{ route('categories.index') }}" 
                       class="flex items-center px-3 py-2.5 {{ request()->routeIs('categories.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-gray-50 hover:text-slate-900' }} rounded-lg transition-all duration-200 font-medium group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3 {{ request()->routeIs('categories.*') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>
                        Gestion Catégories
                    </a>
                    @endif


                <a href="{{ route('tasks.index') }}" 
                       class="flex items-center px-3 py-2.5 {{ request()->routeIs('tasks*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-gray-50 hover:text-slate-900' }} rounded-lg transition-all duration-200 font-medium group">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
         class="w-5 h-5 mr-3 {{ request()->routeIs('tasks*') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
    </svg>

                       Gestion des taches
                    </a>

                    @if(Auth::user()->role === 'admin')
    <a href="{{ route('users.index') }}" 
       class="flex items-center px-3 py-2.5 {{ request()->routeIs('users.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-gray-50 hover:text-slate-900' }} rounded-lg transition-all duration-200 font-medium group">
        
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3 {{ request()->routeIs('users.*') ? 'text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72M15.003 5.783a9.112 9.112 0 013.551 1.423 3 3 0 00-4.241 2.366M8.001 5.783a9.112 9.112 0 013.551-1.423 3 3 0 00-4.241 2.366m-.002 3.336a9.094 9.094 0 00-.479 3.741 3 3 0 004.682 2.72M15.003 18.72a9.094 9.094 0 00-3.551 1.423 3 3 0 004.241 2.366M8.001 18.72a9.094 9.094 0 00-3.551-1.423 3 3 0 004.241 2.366" />
        </svg>

        Gestion d'équipe
    </a>
@endif

                  
                </nav>





                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    <div class="flex items-center px-2">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-xs">
                                {{ substr(Auth::user()->name ?? 'Invité', 0, 1) }}

                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-xs font-semibold text-slate-700 truncate w-32">{{ Auth::user()->name ?? 'Invité' }}</p>
                            <p class="text-[10px] text-slate-500 truncate w-32">Session active</p>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="flex-1 flex flex-col lg:ml-64">
                
                @include('layouts.navigation')

                @isset($header)
                    <header class="bg-white border-b border-gray-200">
                        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                            <h2 class="font-semibold text-lg text-slate-800 leading-tight">
                                {{ $header }}
                            </h2>
                        </div>
                    </header>
                @endisset

                <main class="p-6">
                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
       
    </body>
</html>