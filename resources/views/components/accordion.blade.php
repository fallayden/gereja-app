@props([
    'title',
    'number' => null,
    'open' => false,
])

<div x-data="{ open: {{ $open ? 'true' : 'false' }} }"
     class="border border-slate-200 rounded-lg bg-surface mb-3 overflow-hidden shadow-sm hover:border-slate-300 transition">
    <button @click="open = !open"
            type="button"
            class="w-full flex items-center justify-between p-4 md:p-5 text-left focus:outline-none focus:bg-slate-50 transition">
        <div class="flex items-center space-x-3 pr-4">
            @if($number)
                <span class="w-7 h-7 rounded-full bg-blue-50 text-primary font-bold text-xs flex items-center justify-center flex-shrink-0">
                    {{ $number }}
                </span>
            @endif
            <span class="font-display font-semibold text-sm md:text-base text-primary">
                {{ $title }}
            </span>
        </div>
        <div class="flex-shrink-0 text-slate-400">
            <svg class="w-5 h-5 transform transition-transform duration-200" :class="{ 'rotate-180 text-tertiary': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </button>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-cloak
         class="px-4 pb-5 pt-1 md:px-5 border-t border-slate-100 text-secondary text-sm leading-relaxed">
        {{ $slot }}
    </div>
</div>
