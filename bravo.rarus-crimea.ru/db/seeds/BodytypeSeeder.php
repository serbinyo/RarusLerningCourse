<?php
/**
 * Class BodytypeSeeder
 *
 * @author       <serbinyo@gmail.com>
 */

use Phinx\Seed\AbstractSeed;

/**
 * Class BodytypeSeeder
 *
 * Класс отвечает за наполнение таблицы
 * bodytype тестовыми seed данными
 */
class BodytypeSeeder extends AbstractSeed
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
                'name' => 'Хэтчбек',
                'description' => 'Хэтчбек',
                'img' => '/img/bodytype/hetchbek.jpg',
                'cost' => '0',
            ],
            [
                'name' => 'Седан',
                'description' => 'Седан',
                'img' => '/img/bodytype/sedan.jpg',
                'cost' => '20000',
            ],
            [
                'name' => 'Универсал',
                'description' => 'Универсал',
                'img' => '/img/bodytype/universal.jpg',
                'cost' => '40000',
            ],
        ];
        $this->table('bodytype')->insert($data)->save();
    }
}
