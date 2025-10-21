<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: false }" x-init="
    darkMode = localStorage.getItem('theme') === 'dark' || 
    (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
    $watch('darkMode', val => {
        localStorage.setItem('theme', val ? 'dark' : 'light');
        val ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark');
    });
    if (darkMode) document.documentElement.classList.add('dark');
" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="min-h-screen flex" x-data="{ sidebarOpen: false }">
        <!-- Mobile Sidebar Backdrop -->
        <div 
            x-show="sidebarOpen" 
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"
            @click="sidebarOpen = false"
        ></div>

        <!-- Sidebar -->
        <div 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-primary-50 to-white dark:from-gray-800 dark:to-gray-900 border-r border-primary-200 dark:border-gray-700 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0"
        >
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 border-b border-primary-200 dark:border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">M</span>
                    </div>
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Mandali</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-8 px-4 pb-4 flex-1">
                @livewire('navigation')
            </nav>

            <!-- User Info & Controls -->
            <div class="border-t border-primary-200 dark:border-gray-700 p-4">
                @auth
                    <div class="flex items-center space-x-3 mb-4">
                        <img class="w-8 h-8 rounded-full bg-primary-300" 
                             src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=92400e&background=fbbf24" 
                             alt="{{ auth()->user()->name }}">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                    </div>
                @endauth

                <!-- Dark Mode Toggle -->
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm text-gray-600 dark:text-gray-300">Dark Mode</span>
                    <button 
                        @click="darkMode = !darkMode"
                        :class="darkMode ? 'bg-primary-600' : 'bg-gray-200'"
                        class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                        role="switch"
                        :aria-checked="darkMode"
                    >
                        <span 
                            :class="darkMode ? 'translate-x-5' : 'translate-x-0'"
                            class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow-lg ring-0 transition duration-200 ease-in-out"
                        ></span>
                    </button>
                </div>

                @auth
                    <!-- Logout Button -->
                    @livewire('auth.logout-button')
                @else
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" 
                       class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 text-center block">
                        Login
                    </a>
                @endauth
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 h-16 flex items-center justify-between px-4 lg:px-6">
                <!-- Mobile menu button -->
                <button 
                    @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden p-2 rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-primary-500"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Page Title -->
                <div class="flex-1 px-4 lg:px-0">
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                        @yield('page-title', 'Dashboard')
                    </h1>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center space-x-4">
                    @yield('header-actions')
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 dark:bg-gray-900">
                <div class="p-4 lg:p-6">
                    @yield('content')
                    {{ $slot ?? '' }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>