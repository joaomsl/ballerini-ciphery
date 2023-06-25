<header class="flex flex-col sm:flex-row items-center justify-between">
    <div class="flex-grow text-center sm:flex-grow-0 sm:text-left">
        <h1 class="font-extrabold text-4xl leading-relaxed text-zinc-800 dark:text-zinc-200">Ciphery</h1>
        <p class="text-zinc-800 dark:text-zinc-500 text-xl font-medium">Desbloqueie seu mundo com senhas seguras!</p>
    </div>
    <div class="order-first flex items-center gap-1 ms-auto sm:order-last sm:ms-0">
        <x-header.button x-data="themeButton" @click="toggleTheme" icon-class="ph">
            <x-slot:icon x-bind:class="theme.iconClass"></x-slot::icon>
        </x-header.button>

        <x-header.button
            href="https://github.com/joaomsl/ballerini-ciphery"
            target="_blank"
            rel="noopener noreferrer"
            icon-class="ph ph-github-logo" />
    </div>
</header>
