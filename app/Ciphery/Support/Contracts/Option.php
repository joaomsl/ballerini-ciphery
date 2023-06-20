<?php

declare(strict_types=1);

namespace App\Ciphery\Support\Contracts;

interface Option
{

    /** @return string */
    public function getId(): string;

    /** @return string */
    public function getName(): string;

}
