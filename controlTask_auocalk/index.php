<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/parts/connection.php';

use function Lib\Calklib\getData\sectionBuilder;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <!--[if lt IE 9]>
    <script src="js/out/html5shiv.min.js"></script>
    <![endif]-->
    <title>Конфигуратор Ford Focus</title>
    <meta name="keywords" content="Конфигуратор,Ford,Focus"/>
    <meta name="description" content=""/>
    <link href="style/style.css?v=1.0.1" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/autocalk.js?v=1.0.3"></script>
    <script src="js/data-tables.js?v=1.0.1"></script>
    <?php require_once __DIR__ . '/parts/dataTablesLinks.php' ?>
</head>

<body>
<div class="wrapper">

    <?php if (array_key_exists('series', $_POST)) : ?>

        <header class="header-result">
            <strong><a href="/" class="main-link">Конфигуратор Ford Focus</a></strong>
            <div>
                <img width="618" height="348" src="img/FordFocus.png" class="main-image" id="image" alt="FordFocus">
            </div>
        </header><!-- .header-->

    <?php else: ?>

        <header class="header">
            <div class="conf-title">
                Конфигуратор Ford Focus
            </div>
        </header><!-- .header-->

    <?php endif; ?>

    <div class="middle">

        <div class="container">
            <?php

            if (array_key_exists('series', $_POST)) :
                list($series_name, $series_cost) = explode('?', $_POST['series']);
                list($bodytype_name, $bodytype_cost) = explode('?', $_POST['bodytype']);
                list($power_name, $power_cost) = explode('?', $_POST['power']);
                list($color_name, $color_cost) = explode('?', $_POST['color']);
                list($furnish_name, $furnish_cost) = explode('?', $_POST['furnish']);
                $dop_cost = 0;

                $dops = [];
                foreach ($_POST as $key => $value) {
                    if ($key !== 'series'
                        && $key !== 'bodytype'
                        && $key !== 'power'
                        && $key !== 'color'
                        && $key !== 'furnish'
                        && $key !== 'dop-cost'
                    ) {
                        $dops[] = $key;
                    }
                }

                foreach ($dops as $dop) {
                    list($dname, $dcost) = explode('?', $dop);
                    $dop_cost += $dcost;
                }

                $finallyPrice =
                    $series_cost + $bodytype_cost
                    + $power_cost + $color_cost
                    + $furnish_cost + $dop_cost;

                $logInfo->info(
                    'Выбор пользователя',
                    [
                        'Комплектация' => $series_name,
                        'Кузов' => $bodytype_name,
                        'Движок' => $power_name,
                        'Цвет' => $color_name,
                        'Отделка' => $furnish_name,
                        'Дополнительные опции' => $dops,
                        'Итоговая стоимость' => $finallyPrice,
                    ]
                );

                ?>
                <main>
                    <table id="toExport" class="display export-table" style="display: none;">
                        <thead>
                        <tr>
                            <th>Позиция</th>
                            <th>Количество</th>
                            <th>Стоимость, руб</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="export-first-col">Комплектация <?= $series_name ?></td>
                            <td>1</td>
                            <td class="export-cost-col"><?= number_format((int)$series_cost, 0, ',',
                                    ' ') ?></td>
                        </tr>
                        <tr>
                            <td class="export-first-col">Тип кузова <?= $bodytype_name ?></td>
                            <td>1</td>
                            <td><?= number_format((int)$bodytype_cost, 0, ',',
                                    ' ') ?></td>
                        </tr>
                        <tr>
                            <td class="export-first-col">Двигатель и трансмиссия <?= $power_name ?></td>
                            <td>1</td>
                            <td><?= number_format((int)$power_cost, 0, ',',
                                    ' ') ?></td>
                        </tr>
                        <tr>
                            <td class="export-first-col">Цвет <?= $color_name ?></td>
                            <td>1</td>
                            <td><?= number_format((int)$color_cost, 0, ',',
                                    ' ') ?></td>
                        </tr>
                        <tr>
                            <td class="export-first-col">Отделка интерьера <?= $furnish_name ?></td>
                            <td>1</td>
                            <td><?= number_format((int)$furnish_cost, 0, ',',
                                    ' ') ?></td>
                        </tr>
                        <?php
                        foreach ($dops as $dop) {
                            list($dname, $dcost) = explode('?', $dop);
                            echo '<tr>';
                            $dop = str_replace('_', ' ', $dop);
                            echo '<td class="export-first-col">Доп. опция: '
                                . str_replace('_', ' ', $dname) . '</td>';
                            echo '<td>1</td>';
                            echo '<td>' . number_format((int)$dcost, 0, ',',
                                    ' ') . '</td>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>
                            <td class="export-first-col"></td>
                            <td><strong>Всего</strong></td>
                            <td><?= number_format((int)$finallyPrice, 0, ',',
                                    ' ') ?></td>
                        </tr>
                        </tbody>
                    </table>

                    <table id="dataTable" class="display" style="width:100%;">
                        <thead>
                        <tr>
                            <th>Автомобиль</th>
                            <th>Комплектация</th>
                            <th>Кузов</th>
                            <th>Мотор и трансмиссия</th>
                            <th>Лакокрасочное покрытие</th>
                            <th>Отделка интерьера</th>
                            <th>Дополнительные опции</th>
                            <th>Цена:</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td>Ford Focus</td>
                        <td><?= $series_name ?></td>
                        <td><?= $bodytype_name ?></td>
                        <td><?= $power_name ?></td>
                        <td><?= $color_name ?></td>
                        <td><?= $furnish_name ?></td>
                        <td>
                            <?php
                            foreach ($dops as $dop) {
                                list($dname, $dcost) = explode('?', $dop);
                                $dname = str_replace('_', ' ', $dname);
                                echo $dname . "<br>\n";
                            }
                            ?>
                        </td>
                        <td style="width:100px"><strong><?= number_format((int)$finallyPrice, 0, ',',
                                    ' ') . ' руб' ?></strong></td>
                        </tbody>
                    </table>
                </main>
                <br>
                <div class="block-title">
                    <p><a href="/" class="main-link">Начать сначала</a></p>
                </div>

            <?php else:

            echo '<main class="content">';
            require_once __DIR__ . '/parts/formBuilder.php';
            echo '</main>';

            ?>

        </div><!-- .container-->

        <aside class="left-sidebar">
            <div class="section-title">Инфо</div>

            <div class="info-title">Ваш выбор
                <hr>
            </div>

            <div class="section-title">Ford Focus</div>

            <div class="info-title">Текущая цена</div>
            <div class="section-title">
                <span id="cost_block">
                    <?= number_format((int)$cost, 0, ',', ' ') . ' руб' ?>
                </span>
            </div>

            <div class="block-title">
                <br>
                <p><a href="/" class="main-link">Начать сначала</a></p>
            </div>
        </aside><!-- .left-sidebar -->

        <?php endif; ?>

    </div><!-- .middle-->

    <footer class="footer">
        <strong></strong>
    </footer><!-- .footer -->

</div><!-- .wrapper -->
</body>
</html>