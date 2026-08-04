<x-app-layout title="GBIA GRAMMATA — Selamat Datang">
    <div class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-heading
            title="Selamat Datang di GBIA GRAMMATA"
            subtitle="Pondasi sistem desain, Tailwind CSS, Alpine.js, dan 16 komponen Blade UI telah berhasil dipasang."
            centered="true"
        />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-8">
            <x-card class="text-center">
                <h3 class="font-display font-bold text-lg text-primary mb-1">Design System</h3>
                <p class="text-xs text-secondary">Warna kustom (Navy, Merah, Slate Gray) dan tipografi Merriweather + Inter aktif.</p>
            </x-card>

            <x-card class="text-center">
                <h3 class="font-display font-bold text-lg text-primary mb-1">Alpine.js</h3>
                <p class="text-xs text-secondary">Siap digunakan untuk interaksi menu mobile, accordion, dan dropdown filter.</p>
            </x-card>

            <x-card class="text-center">
                <h3 class="font-display font-bold text-lg text-primary mb-1">16 Komponen Blade</h3>
                <p class="text-xs text-secondary">Layout, Navbar, Footer, ScheduleCard, ArticleCard, Accordion, dll.</p>
            </x-card>
        </div>
    </div>
</x-app-layout>
