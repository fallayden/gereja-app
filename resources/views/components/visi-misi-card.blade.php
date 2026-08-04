@props([
    'title',
    'icon' => null,
    'action' => null,
    'actionText' => 'Baca Selengkapnya',
])

<x-card class="flex flex-col justify-between h-full hover:shadow-lg transition-all duration-300">
    <div>
        <div class="w-12 h-12 rounded-lg bg-blue-50 text-primary flex items-center justify-center mb-4">
            @if($icon)
                {!! $icon !!}
            @else
                <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @endif
        </div>

        <h3 class="font-display font-bold text-xl text-primary mb-3">
            {{ $title }}
        </h3>

        <div class="text-secondary text-sm leading-relaxed mb-6">
            {{ $slot }}
        </div>
    </div>

    @if($action)
        <div>
            <x-button :href="$action" variant="outline" class="w-full text-xs py-2">
                {{ $actionText }} &rarr;
            </x-button>
        </div>
    @endif
</x-card>
