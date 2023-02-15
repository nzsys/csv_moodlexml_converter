<?php

declare(strict_types=1);

namespace Nzsys\XmlModel;

use Nzsys\Model\Doctrine;
use Nzsys\Model\QuestionName;
use Nzsys\Model\Answer;
use Nzsys\Model\Correct;

final class MoodleModel
{

	public function __construct(
        private readonly Doctrine $doctrine,
        private readonly QuestionName $questionName,
        private readonly Answer $answerA,
        private readonly Answer $answerB,
        private readonly Answer $answerC,
        private readonly Correct $correct,

    ) {}

    public function getDoctrine(): ?string
    {
        return $this->doctrine->value();
    }

    public function getQuestionName(): string
    {
        return $this->questionName->value();
    }

    public function getAnswerA(): string
    {
        return $this->answerA->value();
    }

    public function getAnswerB(): string
    {
        return $this->answerB->value();
    }

    public function getAnswerC(): string
    {
        return $this->answerC->value();
    }

    public function getCorrect(): string
    {
        return $this->correct->value();
    }

    public function getFraction(string $answerField): int
    {
        return $this->correct->value() === $answerField ? 100 : 0;
    }
}
