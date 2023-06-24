<?php

declare(strict_types=1);

namespace App\Ciphery\Contracts;

interface Option
{

    /** @return string */
    public function getId(): string;

    /** @return string */
    public function getName(): string;

}
