<nav x-data="{ open: false }" class="bg-primary text-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo & Brand Name -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo GBIA GRAMMATA" class="w-10 h-10 rounded-full object-cover border border-white/20 group-hover:scale-105 transition">

                    <div>
                        <span class="font-display font-bold text-xl tracking-tight block text-white">GBIA GRAMMATA</span>
                        <span class="text-xs text-blue-200 tracking-wider uppercase block">Gereja Baptis Independen Alkitabiah</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('home') }}"
                   class="font-medium text-sm transition-colors py-2 border-b-2 {{ request()->routeIs('home') ? 'border-tertiary text-white font-semibold' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                    Beranda
                </a>
                <a href="{{ route('about') }}"
                   class="font-medium text-sm transition-colors py-2 border-b-2 {{ request()->routeIs('about') ? 'border-tertiary text-white font-semibold' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                    Tentang Kami
                </a>
                <a href="{{ route('warta.index') }}"
                   class="font-medium text-sm transition-colors py-2 border-b-2 {{ request()->routeIs('warta.*') ? 'border-tertiary text-white font-semibold' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                    Warta Jemaat
                </a>
                <a href="{{ route('pedang-roh.index') }}"
                   class="font-medium text-sm transition-colors py-2 border-b-2 {{ request()->routeIs('pedang-roh.*') ? 'border-tertiary text-white font-semibold' : 'border-transparent text-blue-100 hover:text-white hover:border-blue-300' }}">
                    Pedang Roh
                </a>
                <a href="{{ route('filament.admin.auth.login') }}"
                   class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-primary shadow-sm transition hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21H6.75a2.25 2.25 0 0 1-2.25-2.25v-6a2.25 2.25 0 0 1 2.25-2.25Z"/>
                    </svg>
                    Admin
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center lg:hidden">
                <button @click="open = !open"
                        type="button"
                        class="p-2 rounded-md text-blue-100 hover:text-white hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu"
                        :aria-expanded="open">
                    <span class="sr-only">Buka menu navigasi</span>
                    <svg class="h-6 w-6" x-show="!open" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="h-6 w-6" x-show="open" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         x-cloak
         class="bg-blue-950 border-t border-white/10 px-4 pt-2 pb-4 space-y-1 lg:hidden">
        <a href="{{ route('home') }}"
           class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-tertiary text-white font-semibold' : 'text-blue-100 hover:bg-white/10 hover:text-white' }}">
            Beranda
        </a>
        <a href="{{ route('about') }}"
           class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'bg-tertiary text-white font-semibold' : 'text-blue-100 hover:bg-white/10 hover:text-white' }}">
            Tentang Kami
        </a>
        <a href="{{ route('warta.index') }}"
           class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('warta.*') ? 'bg-tertiary text-white font-semibold' : 'text-blue-100 hover:bg-white/10 hover:text-white' }}">
            Warta Jemaat
        </a>
        <a href="{{ route('pedang-roh.index') }}"
           class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('pedang-roh.*') ? 'bg-tertiary text-white font-semibold' : 'text-blue-100 hover:bg-white/10 hover:text-white' }}">
            Pedang Roh
        </a>
        <a href="{{ route('filament.admin.auth.login') }}"
           class="mt-3 flex items-center justify-center gap-2 rounded-md bg-white px-3 py-2.5 text-base font-semibold text-primary transition hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-white">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21H6.75a2.25 2.25 0 0 1-2.25-2.25v-6a2.25 2.25 0 0 1 2.25-2.25Z"/>
            </svg>
            Admin
        </a>
    </div>
</nav>
