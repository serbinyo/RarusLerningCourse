<?php
/**
 * Class FurnishSeeder
 *
 * @author       <serbinyo@gmail.com>
 */

use Phinx\Seed\AbstractSeed;

/**
 * Class FurnishSeeder
 *
 * Класс отвечает за наполнение таблицы
 * furnish тестовыми seed данными
 */
class FurnishSeeder extends AbstractSeed
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
                'name' => 'Ткань Twist',
                'description' => 'Ткань Twist',
                'img' => '/img/furnish/twist.png',
                'cost' => '0',
            ],
            [
                'name' => 'Ткань Groove/Lux',
                'description' => 'Ткань Groove/Lux',
                'img' => '/img/furnish/groove.png',
                'cost' => '0',
            ],
            [
                'name' => 'Ткань/Кожа Capretto/Groove',
                'description' => 'Ткань/Кожа Capretto/Groove',
                'img' => '/img/furnish/leather.png',
                'cost' => '37500',
            ],
        ];
        $this->table('furnish')->insert($data)->save();
    }
}
