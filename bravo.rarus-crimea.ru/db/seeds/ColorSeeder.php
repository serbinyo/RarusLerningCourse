<?php
/**
 * Class ColorSeeder
 *
 * @author       <serbinyo@gmail.com>
 */

use Phinx\Seed\AbstractSeed;

/**
 * Class ColorSeeder
 *
 * Класс отвечает за наполнение таблицы
 * color тестовыми seed данными
 */
class ColorSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Frozen White',
                'description' => 'Frozen White',
                'img' => '/img/color/white.jpg',
                'cost' => '0',
            ],
            [
                'name' => 'Deep Impact Blue Металлик',
                'description' => 'Deep Impact Blue Металлик',
                'img' => '/img/color/blue.jpg',
                'cost' => '17000',
            ],
            [
                'name' => 'Shadow Black Металлик',
                'description' => 'Shadow Black Металлик',
                'img' => '/img/color/black.jpg',
                'cost' => '17000',
            ],
            [
                'name' => 'Candy Red',
                'description' => 'Candy Red',
                'img' => '/img/color/red.jpg',
                'cost' => '22500',
            ],
        ];
        $this->table('color')->insert($data)->save();
    }
}
