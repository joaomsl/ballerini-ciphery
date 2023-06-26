<?php

namespace App\Providers;

use App\Ciphery\Characteristics\CharacteristicsCollection;
use App\Ciphery\HashingAlgo;
use App\Ciphery\Characteristics;
use App\Ciphery\Contracts\Option;
use App\Ciphery\HashingAlgo\HashingAlgoCollection;
use Closure;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {}

    public function boot(UrlGenerator $url): void
    {
        if(env('APP_ENV') == 'production') {
            $url->forceScheme('https');
        }

        $this->app->singleton(HashingAlgoCollection::class, Closure::fromCallable([$this, 'makeHashingAlgoCollection']));
        $this->app->singleton(CharacteristicsCollection::class, Closure::fromCallable([$this, 'makeCharacteristicsCollection']));
    }

    /**
     * @param Option[] $options
     * @return array<string, Option>
     */
    protected function optionIdHasKeys(array $options): array
    {
        return collect($options)
            ->keyBy(fn(Option $option) => $option->getId())
            ->all();
    }

    /** @return HashingAlgoCollection */
    protected function makeHashingAlgoCollection(): HashingAlgoCollection
    {
        return new HashingAlgoCollection($this->optionIdHasKeys([
            new HashingAlgo\Md5HashingAlgo('md5', 'MD5'),
            new HashingAlgo\Sha1HashingAlgo('sha1', 'SHA-1'),
            new HashingAlgo\BcryptHashingAlgo('bcrypt', 'Bcrypt')
        ]));
    }

    /** @return CharacteristicsCollection */
    protected function makeCharacteristicsCollection(): CharacteristicsCollection
    {
        return new CharacteristicsCollection($this->optionIdHasKeys([
            new Characteristics\CapitalLettersCharacteristic('capital_letters', 'ABC'),
            new Characteristics\SmallLettersCharacteristic('small_letters', 'abc'),
            new Characteristics\NumbersCharacteristic('numbers', '123'),
            new Characteristics\SymbolsCharacteristic('symbols', '!#@')
        ]));
    }

}
