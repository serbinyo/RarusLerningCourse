<?php

class Test
{
    private $a = false;
    private $r = null;

    public function show(&$v)
    {
        if (!$this->a) {
            $this->a = true;
            $this->r = &$v;
        }
        var_dump($this->r);
    }

    public function reset()
    {
        $this->a = false;
    }
}

$t = new Test();

$a = [[1, 2], [3, 4], [5, 6]];
foreach ($a as &$p) {
    $t->show($p);
}