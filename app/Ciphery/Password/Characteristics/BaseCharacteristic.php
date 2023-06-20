<?php

declare(strict_types=1);

namespace App\Ciphery\Password\Characteristics;

use App\Ciphery\Password\Characteristics\Contracts\Characteristic;
use App\Ciphery\Support\BaseOption;

abstract class BaseCharacteristic extends BaseOption implements Characteristic
{}
