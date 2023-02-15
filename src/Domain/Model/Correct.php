<?php

declare(strict_types=1);

namespace Nzsys\Model;

final class Correct
{
    public function __construct(
        private readonly string $correct
    ) {}

    public function value(): string
    {
        return $this->correct;
    }
}
