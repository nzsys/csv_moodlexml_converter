<?php

declare(strict_types=1);

namespace Nzsys\Model;

use InvalidArgumentException;

final class QuestionName
{
	public function __construct(
		private readonly string $questionName
	) {
		if (!$questionName) {
			throw new InvalidArgumentException('設問の値が空です');
		}
	}

	public function value(): string
	{
		return $this->questionName;
	}
}
