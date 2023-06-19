@props(['iconClass'])

<button class="bg-zinc-800 rounded p-2 leading-none hover:text-zinc-200 transition-colors">
    <i @class([$iconClass, 'text-base leading-none'])></i>
</button>
