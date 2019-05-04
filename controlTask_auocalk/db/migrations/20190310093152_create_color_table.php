<?php
/**
 * Class CreateColorTable
 *
 * @author       <serbinyo@gmail.com>
 */

use Phinx\Migration\AbstractMigration;

/**
 * Class CreateColorTable
 *
 * Класс создает таблицу color в БД. Таблица
 * предназначена для хранения записей о доступных
 * вариантах отделки салона (интерьер)
 *
 * Таблица содержит следующие столбцы:
 *  name - наименование
 *  description - описание
 *  img - путь до изображения-превью
 *  cost - стоимость
 */
class CreateColorTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('color');
        $table->addColumn('name', 'string', ['null' => false])
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('img', 'string', ['null' => false])
            ->addColumn('cost', 'decimal', ['null' => false, 'precision' => 10, 'scale' => 2])
            ->create();
    }
}
