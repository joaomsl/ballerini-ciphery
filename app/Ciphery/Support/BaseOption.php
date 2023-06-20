<?php

declare(strict_types=1);

namespace App\Ciphery\Support;

use App\Ciphery\Support\Contracts\Option;

class BaseOption implements Option
{

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(protected string $id, protected string $name)
    {}

    /** @inheritDoc */
    public function getId(): string
    {
        return $this->id;
    }

    /** @inheritDoc */
    public function getName(): string
    {
        return $this->name;
    }

}
