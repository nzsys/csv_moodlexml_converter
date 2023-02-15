<?php

declare(strict_types=1);

namespace Nzsys\Model;

use InvalidArgumentException;

final class Category
{
    private const CATEGORY_ROOT = '$cat1$/top/';

	public function __construct(
		private readonly string $category
	) {
		if (!$category) {
			throw new InvalidArgumentException('カテゴリの値が空です');
		}
	}

	public function value(): string
	{
		return $this->category;
	}

    public function toMoodleCategory(): string
    {
        $categoryName = match($this->value()) {
            '1' => 'カテゴリ1',
            '2' => 'カテゴリ2',
            default => 'デフォルト'
        };
        return self::CATEGORY_ROOT . $categoryName;
    }
}
