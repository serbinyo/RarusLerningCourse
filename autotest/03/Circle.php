<?php
declare(strict_types=1);

/**
 * Class Circle
 *
 * Неизменяемый круг.
 */
class Circle
{
    private $radius;
    private $area;
    private $circumference;

    /**
     * Circle constructor.
     *
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        if ($radius > 0) {
            $this->radius = $radius;
        } else {
            throw new InvalidArgumentException('Argument must be a positive number');
        }
    }

    /**
     * Метод получает площадь круга
     * по формуле: πr*r
     *
     * @return float
     */
    public function getArea(): float
    {
        if (!isset($this->area)) {
            $area = round($this->radius * $this->radius * M_PI, 2);
            $this->area = $area;
        }
        return $this->area;
    }

    /**
     * Метод получает длину окружности
     * по формуле: 2*πr
     *
     * @return float
     */
    public function getCircumference(): float
    {
        if (!isset($this->circumference)) {
            $circumference = round(2 * M_PI * $this->radius, 2);
            $this->circumference = $circumference;
        }
        return $this->circumference;
    }
}