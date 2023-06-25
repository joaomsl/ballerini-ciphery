@props(['variant' => 'primary'])

@php($classesByVariant = match($variant) {
    'secondary' => 'border-t-gray-500 dark:border-t-gray-300 border-gray-400/70',
    default => 'border-rose-400 border-t-gray-100'
})

<span {{ $attributes->class([$classesByVariant, 'animate-spin w-5 h-5 leading-none aspect-square border-4 rounded-full']) }}></span>
