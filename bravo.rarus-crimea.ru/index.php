<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/parts/connection.php';

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
    <link href="style/style.css?v=1.0.0" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/autocalk.js"></script>
    <script src="js/data-tables.js"></script>
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
                $dop_cost = $_POST['dop-cost'];

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

                $finallyPrice =
                    $series_cost + $bodytype_cost
                    + $power_cost + $color_cost
                    + $furnish_cost + $dop_cost;

                $logInfo->info(
                    "Выбор на сумму $finallyPrice рублей.",
                    [
                        'Комплектация' => $series_name,
                        'Кузов' => $bodytype_name,
                        'Движок' => $power_name,
                        'Цвет' => $color_name,
                        'Отделка' => $furnish_name,
                        'Дополнительные опции' => $dops,
                    ]
                );

                ?>
                <main>
                    <table id="dataTable" class="display" style="width:100%">
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
                                $dop = str_replace('_', ' ', $dop);
                                echo $dop . "<br>\n";
                            }
                            ?>
                        </td>
                        <td><strong><?= $finallyPrice ?> руб</td>
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

        <aside class="right-sidebar">
            <div class="section-title">Превью</div>
            <img width="320" src="img/series/trend.jpg" class="main-image img-block" id="image" alt="FordFocus">

        </aside><!-- .right-sidebar -->

        <?php endif; ?>

    </div><!-- .middle-->

    <footer class="footer">
        <strong></strong>
    </footer><!-- .footer -->

</div><!-- .wrapper -->
</body>
</html>