<?php
declare(strict_types=1);

require_once __DIR__ . '/../../01/getSameParity.php';

use PHPUnit\Framework\TestCase;

class getSameParityTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testGetSameParityTest($enter, $etalon)
    {
        $result = getSameParity($enter);
        $this->assertSame($result, $etalon);
    }

    public function additionProvider()
    {
        return [
            [[1, 2, 3], [1, 3]],
            [[2, 2, 3, 4], [2, 2, 4]],
            [[1, 2, 8], [1]],
            [[2, 2, 8], [2, 2, 8]],
            [[], []],
            [[3, 7, 9, 11], [3, 7, 9, 11]]
        ];
    }
}
