<?php
if (array_key_exists('furnish', $_POST)) {

    list($finally_cost, $furnish_name)
        = explode('?', $_POST['data']);

    list($complectation_id, $series_name,
        $bodytype_name, $bodytype_img, $bodytype_cost,
        $power_name, $power_img, $power_cost,
        $color_name, $color_cost,
        $furnish_cost)
        = explode('?', $_POST['memory']);


} elseif (array_key_exists('breadcrumbs', $_POST)) {

    $complectation_id = $_POST['complectation_id'];
    list($series_name, $bodytype_name, $power_name, $color_name, $furnish_name) = explode('?', $_POST['names']);
    list($bodytype_cost, $power_cost, $color_cost, $furnish_cost, $finally_cost) = explode('?', $_POST['costs']);
    list($bodytype_img, $power_img) = explode('?', $_POST['images']);

} else {
    header('Location: /');
    exit;
}


require __DIR__ . '/vendor/autoload.php';
//добавляем подключение к БД на страницу
require_once __DIR__ . '/parts/connection.php';

$queryBuilder
    ->select('*')
    ->from('dop');
$rows = $queryBuilder->execute()->fetchAll();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <title>Конфигуратор Ford Focus</title>
    <meta name="keywords" content="Конфигуратор,Ford,Focus"/>
    <meta name="description" content=""/>
    <link href="style/style.css?v=1.0.0" rel="stylesheet">
    <script src="style/jquery-1.11.3.min.js"></script>
</head>

<body>

<div class="wrapper">

    <header class="header">
        <strong>Конфигуратор Ford Focus:</strong>
        <div>
            <img width="400" height="225" src="img/dop/warm_sits.png" class="furnish-image" id="image" alt="FordFocus">
            <!-- <img width="618" height="348" src="img/dop/warm_sits.png" class="main-image" id="image" alt="FordFocus">-->
        </div>
        <div>
            <p>
                <!--  На этом сайте вы можете расcчитать стоимость различных модификаций автомобиля Ford Focus-->
            </p>
        </div>
    </header><!-- .header-->

    <div class="middle">

        <div class="container">
            <main class="content">
                <br>

                <!-- Цепочка навигации breadcrumbs-->
                <div class="nav-bar">
                    <a href="/">Комплектация</a>
                    <div class="arrows">>></div>
                    <form action="bodytype.php" method="post">
                        <input type="hidden" name="complectation_id" value="<?= $complectation_id ?>">
                        <input type="hidden" name="series_name" value="<?= $series_name ?>">
                        <input type="hidden" name="cost" value="<?= $bodytype_cost ?>">
                        <input type="hidden" name="images" value="<?= $bodytype_img ?>">
                        <input type="submit" class="nav-button" name="breadcrumbs" value="Кузов">
                    </form>
                    <div class="arrows">>></div>
                    <form action="power.php" method="post">
                        <input type="hidden" name="complectation_id" value="<?= $complectation_id ?>">
                        <input type="hidden" name="names" value="<?= $series_name . '?' . $bodytype_name ?>">
                        <input type="hidden" name="costs" value="<?= $bodytype_cost . '?' . $power_cost ?>">
                        <input type="hidden" name="images" value="<?= $bodytype_img . '?' . $power_img ?>">
                        <input type="submit" class="nav-button" name="breadcrumbs" value="Двигатель и трансмиссия">
                    </form>
                    <div class="arrows">>></div>
                    <form action="color.php" method="post">
                        <input type="hidden" name="complectation_id" value="<?= $complectation_id ?>">
                        <input type="hidden" name="names" value="<?= $series_name
                        . '?' . $bodytype_name . '?' . $power_name ?>">
                        <input type="hidden" name="costs" value="<?= $bodytype_cost
                        . '?' . $power_cost . '?' . $color_cost ?>">
                        <input type="hidden" name="images" value="<?= $bodytype_img . '?' . $power_img ?>">
                        <input type="submit" class="nav-button" name="breadcrumbs" value="Цвет">
                    </form>
                    <div class="arrows">>></div>
                    <form action="furnish.php" method="post">
                        <input type="hidden" name="complectation_id" value="<?= $complectation_id ?>">
                        <input type="hidden" name="names" value="<?= $series_name
                        . '?' . $bodytype_name . '?' . $power_name . '?' . $color_name ?>">
                        <input type="hidden" name="costs" value="<?= $bodytype_cost
                        . '?' . $power_cost . '?' . $color_cost . '?' . $color_cost ?>">
                        <input type="hidden" name="images" value="<?= $bodytype_img . '?' . $power_img ?>">
                        <input type="submit" class="nav-button" name="breadcrumbs" value="Интерьер">
                    </form>
                    <div class="arrows">>></div>
                    <strong>Дополнительные опции</strong>
                </div>
                <br><!-- .breadcrumbs-->

                <strong>Дополнительные опции:</strong><br><br>
                <form action="result.php" method="post">
                    <?php

                    //будем использовать счетчик для отметки первого элемента как checked
                    $i = 0;
                    foreach ($rows as $row) {

                        //выводим опции
                        echo "<input type='checkbox' name='" . $row['name'] . "' value='"
                            . $row['id'] . "' >\n";

                        //следующая строка для JS
                        echo "<input type='hidden' id='" . $finally_cost . "' value='" . $row['img'] . "' >\n";
                        echo "<input type='hidden' value='" . $row['cost'] . "' >\n";

                        echo "<label>" . $row['name'] . "</label>";
                        echo '<br><br>';
                        $i++;
                    }

                    //                    //отправляем данные
                    //                    /** Формат @data:
                    //                     *
                    //                     * @complectation_id  - номер комплектации
                    //                     * @series_name       - название комплектации
                    //                     * @bodytype_name     - название типа кузова
                    //                     * @engine_name       - наименование мотора и трансмиссии
                    //                     * @paint_name        - наименование лакокрасочного покрытия
                    //                     * @furnish_name      - наименование интерьера
                    //                     */
                    //                    $data = $complectation_id . '?' . $series_name
                    //                        . '?' . $bodytype_name . '?' . $power_name
                    //                        . '?' . $color_name . '?' . $furnish_name;

                    /** Формат @memory:
                     *
                     * @complectation_id - номер комплектации
                     * @series_name      - название комплектации
                     * @bodytype_name    - название типа кузова
                     * @bodytype_img     - изображение для страницы bodytype
                     * @bodytype_cost    - цена для страницы bodytype
                     * @power_name       - наименование мотора и трансмиссии
                     * @power_img        - изображение для страницы power
                     * @power_cost       - цена для страницы power
                     * @color_name       - название лакокрасочного покрытия
                     * @color_cost       - цена для страницы color
                     * @furnish_cost     - цена для страницы furnish
                     */
                    $memory = $complectation_id . '?' . $series_name
                        . '?' . $bodytype_name . '?' . $bodytype_img
                        . '?' . $bodytype_cost . '?' . $power_name
                        . '?' . $power_img . '?' . $power_cost
                        . '?' . $color_name . '?' . $color_cost
                        . '?' . $furnish_name . '?' . $furnish_cost;

                    echo "<input type='hidden' name='memory' value='" . $memory . "' >\n";

                    //Отправляем итоговую цену
                    echo "<input type='hidden' name='finallyPrice' id='finallyPrice' value='" . $finally_cost . "' >\n";

                    if ($i !== 0) {
                        echo '<input type="submit" name="dop" value="Далее">';
                    } else {
                        echo '<p>Ошибка. Нет данных.</p>';
                    }
                    ?>
                </form>
                <br>
            </main><!-- .content -->
        </div><!-- .container-->

        <aside class="left-sidebar">
            <strong>Инфо</strong>
            <p>Ваш выбор:</p>
            <hr>
            <strong>Ford Focus</strong><br><br>
            <p>Комплектация: <br>
                <strong><?= $series_name ?></strong></p><br>
            <p>Кузов: <br>
                <strong><?= $bodytype_name ?></strong></p><br>
            <p>Мотор и трансмиссия: <br>
                <strong><?= $power_name ?></strong></p><br>
            <p>Лакокрасочное покрытие: <br>
                <strong><?= $color_name ?></strong></p><br>
            <p>Отделка интерьера: <br>
                <strong><?= $furnish_name ?></strong></p><br>
            <p>Текущая цена: <br>
                <strong id="cost_block"><?= $finally_cost . '.00' ?> руб</strong></p><br>

            <p><a href="/">Начать с начала</a></p>
        </aside><!-- .left-sidebar -->

    </div><!-- .middle-->

    <footer class="footer">
        <strong></strong>
    </footer><!-- .footer -->

</div><!-- .wrapper -->
<script>
    $(window).on('load', function () {
        $(function () {
            $('input[type="checkbox"]').change(function () {

                let newImage = $(this).next(['name=hidden']).attr('value');
                $('#image').attr('src', newImage);

                let cost = $(this).next(['name=hidden']).attr('id');
                cost = parseFloat(cost);


                $("input:checkbox").each(function (index, el) {
                    let
                        element = $(el),
                        dopCost = element.next().next().val(),
                        val;
                    if (element.is(":checked")) {
                        val = parseFloat(dopCost);
                        if (!isNaN(val)) {
                            cost += val;
                        }
                    }
                });
                console.log(cost);
                $('#cost_block').html(cost + '.00 руб');
                $('#finallyPrice').val(cost);
            });
        });
    });
</script>
</body>
</html>