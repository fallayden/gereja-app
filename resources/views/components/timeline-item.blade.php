@props([
    'year',
    'title',
    'description',
    'position' => 'left',
])

<div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group border-b md:border-b-0 border-slate-200 pb-8 md:pb-0 mb-8 md:mb-12">
    <!-- Center Dot -->
    <div class="hidden md:flex items-center justify-center w-10 h-10 rounded-full bg-primary text-white font-bold text-xs shadow-md border-4 border-white z-10 absolute left-1/2 -translate-x-1/2">
        {{ $year }}
    </div>

    <!-- Content Card -->
    <div class="w-full md:w-[calc(50%-2.5rem)]">
        <x-card class="hover:shadow-lg transition">
            <div class="md:hidden inline-block px-3 py-1 bg-primary text-white text-xs font-bold rounded-full mb-3">
                {{ $year }}
            </div>
            <h3 class="font-display font-bold text-lg text-primary mb-2">
                {{ $title }}
            </h3>
            <p class="text-secondary text-sm leading-relaxed">
                {{ $description }}
            </p>
        </x-card>
    </div>
</div>
