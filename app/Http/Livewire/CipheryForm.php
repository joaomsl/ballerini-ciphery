<?php

namespace App\Http\Livewire;

use App\Ciphery\Ciphery;
use App\Ciphery\HashingAlgo\HashingAlgoCollection;
use App\Ciphery\Password\Characteristics\CharacteristicsCollection;
use Livewire\Component;
use Illuminate\Support\Arr;

class CipheryForm extends Component
{

    protected HashingAlgoCollection $hashingAlgoCollection;
    protected CharacteristicsCollection $characteristicsCollection;

    public string $generatedPassword = '';
    public string $generatedHash = '';

    public string $hashingAlgoId;
    public array $characteristicsIds;
    public int $passwordSize = 8;

    protected function regeneratePassword(): void
    {
        $ciphery = new Ciphery(Arr::only(
            $this->characteristicsCollection->all(),
            collect($this->characteristicsIds)
                ->filter(fn(bool $active) => $active)
                ->keys()
                ->all()
        ));

        $this->generatedPassword = $ciphery->generatePassword($this->passwordSize);
    }

    protected function regenerateHash(): void
    {
        $password = $this->generatedPassword;

        if(empty($password)) {
            return;
        }

        $this->generatedHash = $this->hashingAlgoCollection
            ->get($this->hashingAlgoId)
            ->hash($password);
    }

    public function regeneratePasswordAndHash(): void
    {
        $this->regeneratePassword();
        $this->regenerateHash();
    }

    /**
     * @param HashingAlgoCollection $hashingAlgoCollection
     * @param CharacteristicsCollection $characteristicsCollection
     */
    public function boot(
        HashingAlgoCollection $hashingAlgoCollection,
        CharacteristicsCollection $characteristicsCollection
    ) {
        $this->hashingAlgoCollection = $hashingAlgoCollection;
        $this->characteristicsCollection = $characteristicsCollection;
    }

    public function mount()
    {
        $this->hashingAlgoId = Arr::first($this->hashingAlgoCollection->allHashingIds());

        $this->characteristicsIds = array_combine(
            $this->characteristicsCollection->allCharacteristicsIds(),
            array_fill(0, $this->characteristicsCollection->count(), true)
        );

        $this->regeneratePasswordAndHash();
    }

    public function updatedPasswordSize()
    {
        $this->regeneratePasswordAndHash();
    }

    public function render()
    {
        return view('livewire.ciphery-form');
    }

    public function toggleHashingAlgo(string $algoId): void
    {
        $this->hashingAlgoId = $algoId;
        $this->regenerateHash();
    }

    public function toggleCharacteristic(string $characteristicId): void
    {
        $totalOfCharacteristicsActive = collect($this->characteristicsIds)
            ->filter(fn(bool $isActive) => $isActive)
            ->count();

        $newStatus = !$this->characteristicsIds[$characteristicId];

        if($totalOfCharacteristicsActive <= 1 && !$newStatus) {
            return;
        }

        $this->characteristicsIds[$characteristicId] = $newStatus;
        $this->regeneratePasswordAndHash();
    }

}
