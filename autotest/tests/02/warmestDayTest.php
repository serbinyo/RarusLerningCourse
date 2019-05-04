<?php
declare(strict_types=1);

require_once __DIR__ . '/../../02/warmestDay.php';

use PHPUnit\Framework\TestCase;

class warmestDayTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testWarmestDay($enter, $etalon)
    {
        $result = getIndexOfWarmestDay($enter);
        $this->assertSame($result, $etalon);
    }

    public function additionProvider()
    {
        return [
            [[], null],
            [
                [
                    [-5, 7, 1],
                    [3, 2, 3],
                    [-1, -1, 10]
                ],
                2
            ],
            [
                [
                    [-5, 7, 1],
                    [3, 2, 3],
                    [-1, -7, 11],
                    [-3, 15, 10],
                    [0, 1, 3],
                    [8, 24, 10],
                    [6, 11, 12]
                ],
                5
            ]
        ];
    }
}
