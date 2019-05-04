<?php
declare(strict_types=1);

require_once __DIR__ . '/../../03/Circle.php';

use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    /**
     * @dataProvider areaProvider
     */
    public function testGetArea($radius, $area)
    {
        $circle = new Circle($radius);
        $result = $circle->getArea();
        $this->assertSame($result, $area);
    }

    /**
     * @dataProvider circumferenceProvider
     */
    public function testGetCircumference($radius, $circumference)
    {
        $circle = new Circle($radius);
        $result = $circle->getCircumference();
        $this->assertSame($result, $circumference);
    }

    /**
     * @dataProvider exceptionProvider
     */
    public function test__constructExceptions($radius)
    {
        $this->expectException(InvalidArgumentException::class);
        new Circle($radius);
        $this->fail('no exception');
    }

    public function areaProvider()
    {
        return [
            [10, 314.16],
            [15, 706.86],
            [5, 78.54],
            [999, 3135312.61]
        ];
    }

    public function circumferenceProvider()
    {
        return [
            [15, 94.25],
            [12, 75.40],
            [1.001, 6.29],
            [100000000, 628318530.72]
        ];
    }

    public function exceptionProvider()
    {
        return [
            [0],
            [-1],
            [-1.5],
            [-111111111111111]
        ];
    }
}
