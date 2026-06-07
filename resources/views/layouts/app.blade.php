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
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="min-h-screen flex flex-col md:flex-row">
            
            <aside class="w-full md:w-64 bg-indigo-900 text-white flex-shrink-0 shadow-xl">
                <div class="p-6 flex items-center justify-between border-b border-indigo-800">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        <span class="text-xl font-black tracking-wider uppercase text-white">Toko<span class="text-indigo-400">Ku</span></span>
                    </a>
                </div>

                <nav class="p-4 space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition duration-150 {{ request()->routeIs('dashboard') ? 'bg-indigo-700 text-white shadow-md' : 'text-indigo-200 hover:bg-indigo-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        Dashboard Utama
                    </a>

                    <a href="{{ route('products.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition duration-150 {{ request()->routeIs('products.*') ? 'bg-indigo-700 text-white shadow-md' : 'text-indigo-200 hover:bg-indigo-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 11m8 4V4"></path></svg>
                        Manajemen Produk
                    </a>

                    <a href="{{ route('orders.index') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition duration-150 {{ request()->routeIs('orders.*') ? 'bg-indigo-700 text-white shadow-md' : 'text-indigo-200 hover:bg-indigo-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        Transaksi Order
                    </a>

                    <div class="pt-4 border-t border-indigo-800 my-4"></div>

                    <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 rounded-xl text-sm font-medium transition duration-150 {{ request()->routeIs('profile.edit') ? 'bg-indigo-700 text-white shadow-md' : 'text-indigo-200 hover:bg-indigo-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Pengaturan Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-3 rounded-xl text-sm font-medium text-red-300 hover:bg-red-900/50 hover:text-white transition duration-150 text-left">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Keluar / Logout
                        </button>
                    </form>
                </nav>
            </aside>

            <div class="flex-1 flex flex-col min-w-0 overflow-x-hidden">
                
                @if (isset($header))
                    <header class="bg-white shadow-sm border-b border-gray-100">
                        <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>