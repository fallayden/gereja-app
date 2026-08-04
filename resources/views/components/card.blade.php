@props([
    'class' => '',
    'padding' => 'p-6',
])

<div {{ $attributes->merge(['class' => "bg-surface rounded-lg shadow-md border border-slate-100 {$padding} {$class}"]) }}>
    {{ $slot }}
</div>
