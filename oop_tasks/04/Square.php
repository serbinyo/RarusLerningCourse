<?php
declare(strict_types=1);

/**
 * Class Square
 *
 * Класс описывающий фигуру квадрат
 * Размер стороны квадрата инициализируется
 * при создании
 */
class Square
{
    private $side;

    /**
     * Square constructor.
     *
     * @param float $side
     */
    public function __construct(float $side)
    {
        if ($side > 0) {
            $this->side = $side;
        } else {
            throw new InvalidArgumentException('Argument must be a positive number');
        }
    }

    /**
     * @return float
     */
    public function getSide(): float
    {
        return $this->side;
    }
}


