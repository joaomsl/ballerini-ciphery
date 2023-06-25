<?php

namespace App\Http\Requests\Api;

use App\Ciphery\Characteristics\CharacteristicsCollection;
use App\Ciphery\Ciphery;
use App\Ciphery\HashingAlgo\HashingAlgoCollection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GeneratePasswordRequest extends FormRequest
{

    /**
     * @param HashingAlgoCollection<string, \App\Ciphery\Contracts\HashingAlgo> $hashingAlgos
     * @param CharacteristicsCollection<string, \App\Ciphery\Contracts\Characteristic> $characteristics
     */
    public function __construct(
        private HashingAlgoCollection $hashingAlgos,
        private CharacteristicsCollection $characteristics
    ) {}

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'characteristics' => ['required', 'min:1'],
            'characteristics.*' => Rule::in($this->characteristics->keys()->all()),
            'hashing_algo' => ['required', 'string', Rule::in($this->hashingAlgos->keys()->all())],
            'size' => sprintf('required|integer|min:%d|max:%d', Ciphery::MIN_LENGTH, Ciphery::MAX_LENGTH)
        ];
    }

}
