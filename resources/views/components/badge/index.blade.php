@props(['variant' => 'primary'])

@php($classByVariant = match($variant) {
    'secondary' => 'border-zinc-600 text-zinc-600 hover:border-zinc-500 hover:text-zinc-500 transition-colors',
    default => 'border-rose-400 bg-rose-400/10 text-rose-400 pointer-events-none'
})

<button @class([$classByVariant, 'border rounded-full font-semibold text-sm px-4 py-[0.125rem]'])>
    {{ $slot }}
</button>
