<?php
declare(strict_types=1);


/**
 * Class Random
 *
 * генератор случайных чисел,
 * основанный на линейном конгруэнтном методе
 * формула: (a * x + c) % m;
 *
 * @link https://www.intuit.ru/studies/courses/691/547/lecture/12383?page=2 Линейный конгруэнтный
 * генератор псевдослучайных чисел
 */
class Random
{
    private const M = 7;
    private const A = 2;
    private const C = 4;
    private $seed;
    private $default;


    /**
     * Random constructor.
     *
     * @param int $seed
     */
    public function __construct(int $seed)
    {
        $this->seed = $seed;
        $this->default = $seed;
    }


    /**
     * Метод getNext получает следующее псевдослучайное число
     *
     * @return int
     */
    public function getNext(): int
    {
        $this->seed = (self::A * $this->seed + self::C) % self::M;
        return $this->seed;
    }

    public function reset(): void
    {
        $this->seed = $this->default;
    }
}

