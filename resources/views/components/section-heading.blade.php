@props([
    'title',
    'subtitle' => null,
    'centered' => false,
])

<div class="{{ $centered ? 'text-center' : '' }} mb-8">
    <h2 class="font-display text-2xl md:text-3xl font-bold text-primary tracking-tight">
        {{ $title }}
    </h2>
    <div class="h-1 w-16 bg-tertiary rounded-full mt-2 {{ $centered ? 'mx-auto' : '' }}"></div>
    @if($subtitle)
        <p class="text-secondary text-sm md:text-base mt-3 max-w-2xl {{ $centered ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
