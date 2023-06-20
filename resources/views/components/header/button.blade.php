@props(['iconClass', 'href' => null])

@php($isAnchor = is_string($href))
@php($element = $isAnchor ? 'a' : 'button')

<{{ $element }}
    {{ $isAnchor ? sprintf('href=%s', $href) : '' }}
    {{ $attributes->class('block bg-zinc-800 rounded p-2 leading-none hover:text-zinc-200 transition-colors hover:cursor-pointer') }}
>
    <i @class([$iconClass, 'text-base leading-none'])></i>
</{{ $element }}>
