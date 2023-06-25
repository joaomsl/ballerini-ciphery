<?php

namespace App\Http\Requests\Api;

use App\Ciphery\Ciphery;
use App\Ciphery\HashingAlgo\HashingAlgoCollection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GenerateHashRequest extends FormRequest
{

    /**
     * @param HashingAlgoCollection<string, \App\Ciphery\Contracts\HashingAlgo> $hashingAlgos
     */
    public function __construct(
        private HashingAlgoCollection $hashingAlgos,
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
            'password' => sprintf('required|string|min:%d|max:%d', Ciphery::MIN_LENGTH, Ciphery::MAX_LENGTH),
            'hashing_algo' => ['required', 'string', Rule::in($this->hashingAlgos->keys()->all())],
        ];
    }

}
