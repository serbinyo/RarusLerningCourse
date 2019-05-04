<?php
if (array_key_exists('series', $_POST)) {

    list($complectation_id, $series_name, $bodytype_cost, $bodytype_img) = explode('?', $_POST['series']);

} elseif (array_key_exists('breadcrumbs', $_POST)) {

    $complectation_id = $_POST['complectation_id'];
    $series_name = $_POST['series_name'];
    $bodytype_cost = $_POST['cost'];
    $bodytype_img = $_POST['images'];

} else {

    header('Location: /');
    exit;

}

require __DIR__ . '/vendor/autoload.php';
//добавляем подключение к БД на страницу
require_once __DIR__ . '/parts/connection.php';

$queryBuilder
    ->select('*')
    ->from('complectation_bodytype', 'cb')
    ->where('cb.complectation_id = :complectation_id')
    ->setParameter('complectation_id', $complectation_id)
    ->innerJoin('cb', 'bodytype', 'b', 'cb.bodytype_id = b.id');
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
        <div><img width="618" height="348" src="<?= $bodytype_img ?>" class="main-image" id="image" alt="FordFocus">
        </div>
        <div>
            <p>
                <!--                На этом сайте вы можете расcчитать стоимость различных модификаций автомобиля Ford Focus-->
            </p>
        </div>
    </header><!-- .header-->

    <div class="middle">
        <div class="container">
            <main class="content">
                <br>

                <div class="nav-bar">
                    <a href="/">Комплектация</a>
                    <div class="arrows">>></div>
                    <strong>Кузов</strong>
                </div>
                <br>

                <strong>Тип кузова:</strong><br><br>
                <form action="power.php" method="post">
                    <?php
                    //будем использовать счетчик для отметки первого элемента как checked
                    $i = 0;
                    foreach ($rows as $row) {
                        //подготавливаем данные для следующей страницы

                        $updated_cost = $bodytype_cost + $row['cost'];

                        /** Формат @data:
                         *
                         * @updated_cost     - цена для страницы power
                         * @row['img']       - изображение для страницы power
                         * @row['name']      - название типа кузова
                         */
                        $data = $updated_cost . '?' . $row['img'] . '?' . $row['name'];


                        $checked = ($i === 0) ? 'checked' : '';
                        echo "<input type='radio' name='data' value='" . $data . "' " . $checked . " >\n";

                        //следующая строка для JS
                        echo "<input type='hidden' name='$updated_cost' value='" . $row['img'] . "' >";

                        echo "<label>" . $row['name'] . "</label>";
                        echo '<br><br>';
                        $i++;
                    }

                    /** Формат @memory:
                     *
                     * @complectation_id - номер комплектации
                     * @series_name      - название комплектации
                     * @bodytype_cost    - начальная цена для страницы bodytype
                     * @bodytype_img     - изображение для страницы bodytype
                     */
                    $memory = $complectation_id . '?' . $series_name
                        . '?' . $bodytype_cost . '?' . $bodytype_img;

                    echo "<input type='hidden' name='memory' value='" . $memory . "' >\n";


                    if ($i !== 0) {
                        echo '<input type="submit" value="Далее" name="bodytype">';
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
            <p>Текущая цена: <br>
                <strong id="cost_block">
                    <?= $bodytype_cost ?> руб
                </strong>
            </p>
            <br>

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
            $('input[type="radio"]').change(function () {
                let new_image = $(this).next(['name=hidden']).attr('value');
                $('#image').attr('src', new_image);

                let cost = $(this).next(['name=hidden']).attr('name');
                $('#cost_block').html(cost + '.00 руб');
            });
        });
    });
</script>
</body>
</html>