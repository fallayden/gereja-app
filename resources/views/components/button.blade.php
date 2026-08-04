@props([
    'variant' => 'primary',
    'href' => null,
    'type' => 'button',
    'class' => '',
])

@php
    $baseStyles = "inline-flex items-center justify-center font-medium rounded-md px-6 py-3 text-sm transition-all duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2";

    $variants = [
        'primary' => 'bg-tertiary text-white hover:bg-red-700 focus:ring-red-500',
        'secondary' => 'bg-primary text-white hover:bg-blue-900 focus:ring-blue-800',
        'outline' => 'border-2 border-primary text-primary hover:bg-primary hover:text-white focus:ring-blue-800',
    ];

    $style = $baseStyles . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . $class;
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $style]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $style]) }}>
        {{ $slot }}
    </button>
@endif
