@props(['iconClass', 'href' => null])

@php($isAnchor = is_string($href))
@php($element = $isAnchor ? 'a' : 'button')

<{{ $element }}
    {{ $isAnchor ? sprintf('href=%s', $href) : '' }}
    {{ $attributes->class('block bg-zinc-100 dark:bg-zinc-800 rounded p-2 leading-none hover:dark:text-zinc-200 hover:text-zinc-500/80 hover:cursor-pointer') }}
>
    <i {{ isset($icon) ? $icon->attributes : '' }} @class([$iconClass, 'text-base leading-none'])></i>
</{{ $element }}>
