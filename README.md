# csv_moodlexml_converter
CSVをmoodle問題バンク取込用XMLに変換するコード土台。

## Usage
convert.php
```php
$csv = __DIR__ . '/source/変換元.csv';
$xml = __DIR__ . '/xml/変換先.xml';
```
```sh
php convert.php
```
