@props(['variant' => 'primary', 'iconClass' => null])

@php($classByVariant = match($variant) {
    'secondary' => 'bg-zinc-800 text-zinc-600 hover:bg-zinc-800/80 transition-colors',
    default => 'bg-rose-500 text-zinc-50 hover:bg-rose-500/90 transition-colors'
})

<button {{ $attributes->class([$classByVariant, 'block rounded px-6 font-semibold text-sm w-100 h-100 flex items-center gap-2']) }}>
    @if(is_string($iconClass))
        <i @class([$iconClass, 'text-base text-xl'])></i>
    @endif

    {{ $slot }}
    {{-- primary, secondary --}}
</button>
