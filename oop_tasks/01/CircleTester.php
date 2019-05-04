<?php
declare(strict_types=1);

require_once __DIR__ . '/Circle.php';

$circle = new Circle(10);

print_r($circle->getArea() . PHP_EOL);
print_r($circle->getCircumference() . PHP_EOL);
