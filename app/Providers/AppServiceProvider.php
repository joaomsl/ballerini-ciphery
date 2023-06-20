<?php

namespace App\Providers;

use App\Ciphery\HashingAlgo\BycriptHashingAlgo;
use App\Ciphery\HashingAlgo\HashingAlgoCollection;
use App\Ciphery\HashingAlgo\Md5HashingAlgo;
use App\Ciphery\HashingAlgo\Sha1HashingAlgo;
use App\Ciphery\Password\Characteristics\CapitalLettersCharacteristic;
use App\Ciphery\Password\Characteristics\CharacteristicsCollection;
use App\Ciphery\Password\Characteristics\NumbersCharacteristic;
use App\Ciphery\Password\Characteristics\SmallLettersCharacteristic;
use App\Ciphery\Password\Characteristics\SymbolsCharacteristic;
use Closure;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(HashingAlgoCollection::class, Closure::fromCallable([$this, 'makeHashingAlgoCollection']));
        $this->app->singleton(CharacteristicsCollection::class, Closure::fromCallable([$this, 'makeCharacteristicsCollection']));
    }

    /** @return HashingAlgoCollection */
    protected function makeHashingAlgoCollection(): HashingAlgoCollection
    {
        return new HashingAlgoCollection([
            new Md5HashingAlgo('md5', 'MD5'),
            new Sha1HashingAlgo('sha1', 'SHA-1'),
            new BycriptHashingAlgo('bycript', 'Bycript')
        ]);
    }

    /** @return CharacteristicsCollection */
    protected function makeCharacteristicsCollection(): CharacteristicsCollection
    {
        return new CharacteristicsCollection([
            new CapitalLettersCharacteristic('capital_letters', 'ABC'),
            new SmallLettersCharacteristic('small_letters', 'abc'),
            new NumbersCharacteristic('numbers', '123'),
            new SymbolsCharacteristic('symbols', '!#@')
        ]);
    }

}
