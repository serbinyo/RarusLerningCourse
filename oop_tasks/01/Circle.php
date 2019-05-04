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
    private $perimeter;

    /**
     * Circle constructor.
     *
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        $this->radius = $radius;
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
            $this->area = $this->radius * $this->radius * M_PI;
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
        if (!isset($this->perimeter)) {
            $this->perimeter = 2 * M_PI * $this->radius;
        }
        return $this->perimeter;
    }
}
