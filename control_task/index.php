<?php

require __DIR__ . '/vendor/autoload.php';
//добавляем подключение к БД на страницу
require_once __DIR__ . '/parts/connection.php';

$data = $conn->createQueryBuilder()
    ->select('*')
    ->from('model', 'm')
    ->innerJoin('m', 'complectation', 'c', 'c.model_id = m.id')
    ->innerJoin('c', 'series', 's', 'c.series_id = s.id')//    ->getSQL()
;
$rows = $data->execute()->fetchAll();
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
    <script src="/style/jquery-1.11.3.min.js"></script>
</head>

<body>
<div class="wrapper">

    <header class="header">
        <strong>Конфигуратор Ford Focus:</strong>
        <div><img width="618" height="348" src="img/series/trend.jpg" class="main-image" id="image" alt="FordFocus">
        </div>
        <div>
            <p>
                <!--                На этом сайте вы можете рассчитать стоимость различных модификаций автомобиля Ford Focus-->
            </p>
        </div>
    </header><!-- .header-->

    <div class="middle">

        <div class="container">
            <main class="content">
                <br>
                
                <div class="nav-bar">
                    <strong>Комплектация</strong>
                </div>
                <br><br>

                <strong>Выбор комплектации:</strong><br><br>
                <form action="bodytype.php" method="post">
                    <?php
                    //будем использовать счетчик для отметки первого элемента как checked
                    $i = 0;
                    foreach ($rows as $row) {
                        //подготавливаем данные для следующей страницы

                        /** Формат @data:
                         *
                         * @row['id']   - номер комплектации
                         * @row['name'] - название комплектации
                         * @row['cost'] - стоимость
                         * @row['img']  - изображение автомобиля
                         */
                        $data = $row['id'] . '?' . $row['name'] . '?' . $row['cost'] . '?' . $row['img'];
                        $checked = '';
                        if ($i === 0) {
                            $checked = 'checked';
                            $cost = $row['cost'];
                        }
                        echo "<input type='radio' name='series' value='" . $data . "' " . $checked . " >\n";

                        //следующая строка для JS
                        echo "<input type='hidden' name='" . $row['cost'] . "' value='" . $row['img'] . "' >\n";

                        echo "<label>" . $row['name'] . "</label>\n";
                        echo "<br><br>\n";
                        $i++;
                    }
                    if ($i !== 0) {
                        echo '<input type="submit" value="Далее">';
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

            <p>Текущая цена: <br>
                <strong id="cost_block">
                    <?= $cost ?> руб
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
                let newImage = $(this).next(['name=hidden']).attr('value');
                $('#image').attr('src', newImage);

                let cost = $(this).next(['name=hidden']).attr('name');
                $('#cost_block').html(cost + ' руб');
            });
        });
    });
</script>
</body>
</html>