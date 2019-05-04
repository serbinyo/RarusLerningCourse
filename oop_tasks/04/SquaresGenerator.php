<?php
declare(strict_types=1);

require_once __DIR__ . '/Square.php';


/**
 * Class SquaresGenerator
 */
class SquaresGenerator
{

    /**
     * Функция generate - генератор квадратов
     *
     * Возвращает массив квадратов в количестве указанном в параметре num
     * если указан 0 или отрицательное число возвращает пустой массив
     *
     * @param float $side
     * @param int   $num
     *
     * @return array
     */
    public static function generate(float $side, int $num): array
    {
        $result = [];

        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $square = new Square($side);
                $result[] = $square;
            }
        }

        return $result;
    }
}