<?php

declare(strict_types=1);

namespace Nzsys\Model;

use InvalidArgumentException;

final class Answer
{
    public function __construct(
        private readonly string $answer
    ) {
        if (!$answer) {
            throw new InvalidArgumentException('回答の値が空です');
        }
    }

    public function value(): string
    {
        return $this->answer;
    }
}
