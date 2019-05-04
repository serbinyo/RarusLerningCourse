<?php
declare(strict_types=1);

require_once __DIR__ . '/../../04/Random.php';

use PHPUnit\Framework\TestCase;

class RandomTest extends TestCase
{
    public function testGetNext()
    {
        $gen = new Random(7);
        $this->assertSame($gen->getNext(), 7);
        $this->assertSame($gen->getNext(), 6);
        $this->assertSame($gen->getNext(), 9);
        $this->assertSame($gen->getNext(), 0);
        $this->assertSame($gen->getNext(), 7);
        $this->assertSame($gen->getNext(), 6);
        $this->assertSame($gen->getNext(), 9);
        $this->assertSame($gen->getNext(), 0);
    }

    public function testReset()
    {
        $gen = new Random(7);
        $gen->getNext();
        $gen->getNext();
        $gen->getNext();
        $gen->reset();
        $this->assertSame($gen->getNext(), 7);
    }
}
