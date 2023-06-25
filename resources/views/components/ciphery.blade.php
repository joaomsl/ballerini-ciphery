<main x-data="ciphery" class="mt-12 grid grid-cols-3 gap-10">
    <x-box class="col-span-3 lg:col-span-2">
        <x-box.load-ring x-show="!initialized" />

        <div x-cloak x-show="initialized">
            <section>
                <x-title>Senha Padrão</x-title>

                <div class="mt-3 flex flex-wrap items-stretch gap-2">
                    <x-form.input class="flex-grow" disabled />

                    <div class="flex gap-2">
                        <x-form.button variant="secondary" icon-class="ph ph-files" />
                        <x-form.button>Gerar</x-form.button>
                    </div>
                </div>
            </section>

            <section class="mt-10">
                <x-title>Hash Gerado</x-title>

                <div class="mt-3 flex flex-wrap items-stretch gap-2">
                    <x-form.input class="flex-grow" disabled />
                    <x-form.button  icon-class="ph ph-files">Copiar</x-form.button>
                </div>

                <x-badge.wrapper class="mt-8">
                    <template x-for="algo of state.hashAlgos">
                        <x-badge x-data="badge(algo.active)" x-text="algo.name" x-bind:class="getClassesByVariant()" />
                    </template>
                </x-badge.wrapper>
            </section>
        </div>
    </x-box>

    <x-box class="col-span-3 lg:col-span-1">
        <x-box.load-ring x-show="!initialized" />

        <div x-cloak x-show="initialized">
            <section>
                <x-title>Características</x-title>

                <x-badge.wrapper class="mt-3">
                    <template x-for="charType of state.charTypes">
                        <x-badge x-data="badge(charType.active)" x-text="charType.name" x-bind:class="getClassesByVariant()" />
                    </template>
                </x-badge.wrapper>
            </section>

            <section class="mt-6">
                <x-title>Tamanho</x-title>
                <x-form.input class="w-1/3 font-sans" type="number" min="1" max="64" x-model="state.size" />
            </section>
        </div>
    </x-box>
</main>
