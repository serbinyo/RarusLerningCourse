<?php
declare(strict_types=1);

require_once __DIR__ . '/Random.php';

$seq = new Random(100);
$result1 = $seq->getNext() . PHP_EOL;
$result2 = $seq->getNext() . PHP_EOL;

echo ($result1 != $result2) . PHP_EOL; // => true

$seq->reset();
$result21 = $seq->getNext();
$result22 = $seq->getNext();

echo ($result1 == $result21) . PHP_EOL; // => true
echo ($result2 == $result22) . PHP_EOL; // => true
