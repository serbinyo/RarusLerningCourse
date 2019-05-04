<?php
if (array_key_exists('dop', $_POST)) {
    list($complectation_id, $series_name,
        $bodytype_name, $bodytype_img,
        $bodytype_cost, $power_name,
        $power_img, $power_cost,
        $color_name, $color_cost,
        $furnish_name, $furnish_cost)
        = explode('?', $_POST['memory']);

    $dops = [];
    foreach ($_POST as $key => $value) {
        if ($key !== 'memory' && $key !== 'finallyPrice' && $key !== 'dop') {
            $dops[] = $key;
        }
    }
} else {
    header('Location: /');
    exit;
}


require __DIR__ . '/vendor/autoload.php';
//добавляем подключение к БД на страницу
require_once __DIR__ . '/parts/connection.php';

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

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
</head>

<body>

<div class="wrapper">

    <header class="header">
        <strong><a href="/" class="main-link">Конфигуратор Ford Focus</a></strong>
        <div>
            <img width="618" height="348" src="img/FordFocus.png" class="main-image" id="image" alt="FordFocus">
        </div>
        <div>
            <p>
                <!--                На этом сайте вы можете расcчитать стоимость различных модификаций автомобиля Ford Focus-->
            </p>
        </div>
    </header><!-- .header-->

    <div class="middle">

        <div class="container">
            <main>
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
                    <form action="dop.php" method="post">
                        <input type="hidden" name="complectation_id" value="<?= $complectation_id ?>">
                        <input type="hidden" name="names" value="<?= $series_name
                        . '?' . $bodytype_name . '?' . $power_name
                        . '?' . $color_name . '?' . $furnish_name ?>">
                        <input type="hidden" name="costs" value="<?= $bodytype_cost
                        . '?' . $power_cost . '?' . $color_cost
                        . '?' . $color_cost . '?' . $furnish_cost ?>">
                        <input type="hidden" name="images" value="<?= $bodytype_img . '?' . $power_img ?>">
                        <input type="submit" class="nav-button" name="breadcrumbs" value="Дополнительные опции">
                    </form>
                    <div class="arrows">>></div>
                    <strong>Результат</strong>
                </div>
                <br><!-- .breadcrumbs-->

                <table id="example" class="display" style="width:100%">
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
                    <td><strong><?= $_POST['finallyPrice'] ?> руб</td>
                    </tbody>
                </table>
                <br>
            </main><!-- .content -->
        </div><!-- .container-->

    </div><!-- .middle-->

    <footer class="footer">
        <strong></strong>
    </footer><!-- .footer -->

</div><!-- .wrapper -->
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            dom      : 'Bfrtip',
            buttons  : [
                // 'copyHtml5',
                'excelHtml5',
                // 'csvHtml5',
                // 'pdfHtml5',
                {
                    extend     : 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize   : 'LEGAL'
                }
            ],
            searching: false,
            ordering : false,
            paging   : false,
            "info"   : false
        });
    });
</script>
</body>
</html>