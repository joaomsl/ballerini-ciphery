<?php

namespace App\Http\Controllers\Api;

use App\Ciphery\HashingAlgo\HashingAlgoCollection;
use App\Ciphery\Characteristics\CharacteristicsCollection;
use App\Ciphery\Contracts\HashingAlgo;
use App\Ciphery\Contracts\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class CipheryController extends Controller
{

    /**
     * @param HashingAlgoCollection<string, \App\Ciphery\Contracts\HashingAlgo> $hashingAlgos
     * @param CharacteristicsCollection<string, \App\Ciphery\Contracts\Characteristic> $characteristics
     */
    public function __construct(
        private HashingAlgoCollection $hashingAlgos,
        private CharacteristicsCollection $characteristics
    ) {}

    /** @return Response */
    public function options(): Response
    {
        /** @param Collection<string, Option> $collection */
        $describeOptionsByIdAndName = function(Collection $collection): array {
            return $collection
                ->map(fn(Option $option) => $option->getName())
                ->all();
        };

        return response()->json([
            'hashing_algos' => $describeOptionsByIdAndName($this->hashingAlgos),
            'characteristics' => $describeOptionsByIdAndName($this->characteristics)
        ]);
    }

}
