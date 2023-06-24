<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

use App\Ciphery\Contracts\HashingAlgo;
use App\Ciphery\BaseOption;

abstract class BaseHashingAlgo extends BaseOption implements HashingAlgo
{}
