<?php
/**
 * Class DopSeeder
 *
 * @author       <serbinyo@gmail.com>
 */

use Phinx\Seed\AbstractSeed;

/**
 * Class DopSeeder
 *
 * Класс отвечает за наполнение таблицы
 * dop тестовыми seed данными
 */
class DopSeeder extends AbstractSeed
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
                'name' => 'Электроподогрев передних сидений',
                'description' => 'Электроподогрев передних сидений',
                'img' => '/img/dop/warm_sits.png',
                'cost' => '13500',
            ],
            [
                'name' => 'Передние противотуманные фары',
                'description' => 'Передние противотуманные фары',
                'img' => '/img/dop/fog_lights.png',
                'cost' => '8000',
            ],
            [
                'name' => 'Противоугонная система с сигнализацией и датчиками периметра',
                'description' => 'Противоугонная система с сигнализацией и датчиками периметра',
                'img' => '/img/dop/alarm.png',
                'cost' => '15500',
            ],
            [
                'name' => 'Пакет ”Безопасность 1”',
                'description' => 'Передние боковые подушки безопасности, боковые шторки безопасности',
                'img' => '/img/dop/safety.png',
                'cost' => '20000',
            ],
            [
                'name' => 'Пакет ”Комфорт”',
                'description' => 'Двухзонный климат-контроль, автозатемняющееся салонное зеркало заднего вида, датчик'
                    . ' света, датчик дождя, функция задержки выключения головного света \"Follow-me-home\", передние'
                    . ' противотуманные фары',
                'img' => '/img/dop/comfort.png',
                'cost' => '24500',
            ],
            [
                'name' => 'Аудиосистема SYNC 1',
                'description' => 'Аудиосистема CD/MP3 + AM/FM, 6 динамиков, 3,5\" матричный дисплей, 2 USB-порта,'
                    . ' система SYNC 1, включая Bluetooth и голосовое управление на русском языке, 4-строчный матричный'
                    . ' дисплей на приборной панели',
                'img' => '/img/dop/sync.png',
                'cost' => '18000',
            ],
            [
                'name' => 'Пакет ”Зимний 1”',
                'description' => 'Электроподогрев передних сидений, электрообогрев лобового стекла и форсунок'
                    . ' стеклоомывателей',
                'img' => '/img/dop/winter.png',
                'cost' => '22000',
            ],
            [
                'name' => 'Система автоматического торможения (ACS)',
                'description' => 'Система автоматического торможения (ACS)',
                'img' => '/img/dop/acs.png',
                'cost' => '17500',
            ],
            [
                'name' => 'Задние датчики парковки',
                'description' => 'Задние датчики парковки',
                'img' => '/img/dop/parctronic.png',
                'cost' => '17500',
            ],
            [
                'name' => 'Программируемый предпусковой топливный отопитель',
                'description' => 'Программируемый предпусковой топливный отопитель',
                'img' => '/img/dop/heater.png',
                'cost' => '41500',
            ],
            [
                'name' => 'Электрообогрев лобового стекла',
                'description' => 'Обогреваемое лобовое стекло, а также обогрев форсунок стеклоомывателей',
                'img' => '/img/dop/front_glass_heater.png',
                'cost' => '10000',
            ],
            [
                'name' => '16” 5x2-спицевые легкосплавные колесные диски',
                'description' => '16” 5x2-спицевые легкосплавные колесные диски',
                'img' => '/img/dop/disks.png',
                'cost' => '18000',
            ],
        ];
        $this->table('dop')->insert($data)->save();
    }
}
