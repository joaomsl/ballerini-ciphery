<?php

declare(strict_types=1);

namespace App\Ciphery\HashingAlgo;

use App\Ciphery\HashingAlgo\Contracts\HashingAlgo;
use App\Ciphery\Support\BaseOption;

abstract class BaseHashingAlgo extends BaseOption implements HashingAlgo
{}
