<?php
declare(strict_types=1);

require_once __DIR__ . '/SquaresGenerator.php';

$squares = SquaresGenerator::generate(3, 2);

print_r($squares);

// [new Square(3), new Square(3)];
