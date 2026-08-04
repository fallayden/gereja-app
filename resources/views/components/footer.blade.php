<footer class="bg-primary text-blue-100 pt-12 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Col 1: Church Info -->
            <div>
                <h3 class="font-display font-bold text-xl text-white mb-3">GBIA GRAMMATA</h3>
                <p class="text-sm text-blue-200 leading-relaxed mb-4">
                    Gereja Alkitabiah yang berkomitmen mengajarkan kebenaran Firman Allah dan membina jemaat yang bertumbuh dalam Kristus.
                </p>
                <p class="text-xs text-blue-300">
                    📍 Gedung Utama GBIA GRAMMATA
                </p>
            </div>

            <!-- Col 2: Navigation Links -->
            <div>
                <h4 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider">Navigasi Cepat</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="{{ route('warta.index') }}" class="hover:text-white transition">Warta Jemaat</a></li>
                    <li><a href="{{ route('pedang-roh.index') }}" class="hover:text-white transition">Pedang Roh (Majalah)</a></li>
                </ul>
            </div>

            <!-- Col 3: Contact / Schedule info -->
            <div>
                <h4 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider">Jadwal Utamakan</h4>
                <p class="text-sm text-blue-200 mb-1"> Kebaktian Umum: <span class="text-white font-medium">Minggu 09.30 WIB</span></p>
                <p class="text-sm text-blue-200 mb-1"> Sekolah Minggu: <span class="text-white font-medium">Minggu 09.30 WIB</span></p>
                <p class="text-sm text-blue-200 mb-4"> Kebaktian Doa: <span class="text-white font-medium">Jumat 17.30 WIB</span></p>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-blue-300">
            <p>© {{ date('Y') }} GBIA GRAMMATA. Hak Cipta Dilindungi Undang-Undang.</p>
            <p class="mt-2 sm:mt-0">Solus Christus — Sola Scriptura</p>
        </div>
    </div>
</footer>
