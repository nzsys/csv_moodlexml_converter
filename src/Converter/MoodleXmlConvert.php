<?php

declare(strict_types=1);

namespace Nzsys\Converter;

use Nzsys\Model\Answer;
use Nzsys\Model\Category;
use Nzsys\Model\Correct;
use Nzsys\Model\Doctrine;
use Nzsys\Model\QuestionName;
use Nzsys\XmlModel\MoodleModel;
use RuntimeException;


class MoodleXmlConvert
{
    public function __construct(
        private readonly string $csvPath,
        private readonly string $outPath
    ) {
        if (!file_exists($csvPath)) {
            throw new RuntimeException('CSVファイルが見つかりませんでした');
        }
    }

    /** @return \Generator<MoodleModel> */
    private function parseCsv()
    {
        $resource = fopen($this->csvPath, 'rb');
        if (!$resource) {
            throw new RuntimeException('CSVファイルが開けませんでした');
        }
        while (!feof($resource)) {
            $csv = fgetcsv($resource);
            if (!$csv) {
                continue;
            }
            yield new MoodleModel(
                doctrine: new Doctrine($csv[1]),
                questionName: new QuestionName($csv[2]),
                answerA: new Answer($csv[3]),
                answerB: new Answer($csv[4]),
                answerC: new Answer($csv[5]),
                correct: new Correct($csv[6])
            );
        }
        fclose($resource);
    }

    private function getCsvCategory(): Category
    {
        $resource = fopen($this->csvPath, 'rb');
        $line = fgets($resource);
        fclose($resource);
        return new Category($line[0]);
    }

    public function saveXml(): void
    {
        $generator = $this->parseCsv();
        $category = $this->getCsvCategory();
        ob_start();
        include __DIR__ . '/Base.xml';
        $buffer = ob_get_clean();
        file_put_contents($this->outPath, $buffer, LOCK_EX);
    }
}
