<?php

namespace App\Providers;

use App\Ciphery\Characteristics\CharacteristicsCollection;
use App\Ciphery\HashingAlgo;
use App\Ciphery\Characteristics;
use App\Ciphery\HashingAlgo\HashingAlgoCollection;
use Closure;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {}

    public function boot(): void
    {
        $this->app->singleton(HashingAlgoCollection::class, Closure::fromCallable([$this, 'makeHashingAlgoCollection']));
        $this->app->singleton(CharacteristicsCollection::class, Closure::fromCallable([$this, 'makeCharacteristicsCollection']));
    }

    /** @return HashingAlgoCollection */
    protected function makeHashingAlgoCollection(): HashingAlgoCollection
    {
        return new HashingAlgoCollection([
            new HashingAlgo\Md5HashingAlgo('md5', 'MD5'),
            new HashingAlgo\Sha1HashingAlgo('sha1', 'SHA-1'),
            new HashingAlgo\BcryptHashingAlgo('bcrypt', 'Bcrypt')
        ]);
    }

    /** @return CharacteristicsCollection */
    protected function makeCharacteristicsCollection(): CharacteristicsCollection
    {
        return new CharacteristicsCollection([
            new Characteristics\CapitalLettersCharacteristic('capital_letters', 'ABC'),
            new Characteristics\SmallLettersCharacteristic('small_letters', 'abc'),
            new Characteristics\NumbersCharacteristic('numbers', '123'),
            new Characteristics\SymbolsCharacteristic('symbols', '!#@')
        ]);
    }

}
