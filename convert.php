<?php

declare(strict_types=1);

include __DIR__ . '/vendor/autoload.php';

$csv = __DIR__ . '/source/sample.csv';
$xml = __DIR__ . '/xml/sample.moodle.xml';

(new Nzsys\Converter\MoodleXmlConvert($csv, $xml))->saveXml();
