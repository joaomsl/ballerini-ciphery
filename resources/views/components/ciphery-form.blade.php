<main class="mt-12 grid grid-cols-3 gap-10">
    <x-box class="col-span-3 lg:col-span-2">
        <section>
            <x-title>Senha Padrão</x-title>

            <div class="mt-3 flex flex-wrap items-stretch gap-2">
                <x-form.input x-model="content" class="flex-grow" disabled />

                <div class="flex gap-2">
                    <x-form.button x-bind="copyTrigger" variant="secondary" icon-class="ph ph-files" />
                    <x-form.button wire:click.prevent="regeneratePasswordAndHash">Gerar</x-form.button>
                </div>
            </div>
        </section>

        <section class="mt-10">
            <x-title>Hash Gerado</x-title>

            <div class="mt-3 flex flex-wrap items-stretch gap-2">
                <x-form.input x-model="content" class="flex-grow" disabled />
                <x-form.button x-bind="copyTrigger" icon-class="ph ph-files">Copiar</x-form.button>
            </div>

            <x-badge.wrapper class="mt-8">
                    <x-badge>
                        AAAAA
                    </x-badge>
            </x-badge.wrapper>
        </section>
    </x-box>

    <x-box class="col-span-3 lg:col-span-1">
        <section>
            <x-title>Características</x-title>

            <x-badge.wrapper class="mt-3">
                <x-badge>
                    AAAAA
                </x-badge>
            </x-badge.wrapper>
        </section>

        <section class="mt-6">
            <x-title>Tamanho</x-title>
            <x-form.input class="w-1/3 font-sans" type="number" min="1" max="64" />
        </section>
    </x-box>
</main>
