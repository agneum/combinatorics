<?php
require __DIR__ . '/vendor/autoload.php';

$options = getopt('', ['fieldsCount:', 'chipCount:']);
if (empty($options['fieldsCount']) || empty($options['chipCount'])) {
    echo 'Error: check script flags: "fieldsCount" and "chipCount" are required.' . PHP_EOL;
    exit;
}
$filename = 'output/permutations.txt';
$minLimit = 10;

$permutation = new Combinatorics\Permutation($options['fieldsCount'], $options['chipCount']);
$mathHelper = new Helpers\Math();
$generator = new Helpers\Generator($permutation, $mathHelper);

$outputFile = new \SplFileObject($filename, 'w');

if (($countSubsets = $generator->countTotalSubsets()) < $minLimit) {
    $outputFile->fwrite(sprintf('менее %d вариантов', $minLimit));
    echo 'The count of subsets less than ' . $minLimit . PHP_EOL;
    exit;
}

$initialSubset = $permutation->getInitialSubset();
$outputFile->fwrite(sprintf('Общее число вариантов: %s' . PHP_EOL, $countSubsets));


do {
    $outputFile->fwrite($generator->prepareSubsetString($initialSubset));
} while ($generator->composeNewSubset($initialSubset));

echo 'Script successfully finished. Check file: ' . $filename . PHP_EOL;