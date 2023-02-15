<?php

declare(strict_types=1);

namespace Nzsys\Model;

final class Doctrine
{
	public function __construct(
		private readonly ?string $doctrine
	) {}

	public function value(): string
	{
		return $this->doctrine;
	}
}
