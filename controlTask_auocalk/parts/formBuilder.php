<form action="/" id="form-block" method="post">

    <!--    НАЧАЛО БЛОК 1 КОМПЛЕКТАЦИЯ ________________________________________________________    -->
    <div id="block1">
        <div class="options" id="options1">
            <div class="block-title" id="div">
                Комплектация
            </div>

            <?php
            $cost = 0.00;
            if (array_key_exists(0, $series)) {
                $cost = $series[0]['cost'];
            }

            Lib\Calklib\getData\sectionWithRadioBuilder($series, 'series', $logError);
            ?>

            <br><br>
        </div>

        <div id="preview1" class="preview">
            <img width="320" src="img/series/trend.jpg" class="main-image img-block" id="image" alt="FordFocus">
        </div>
    </div>

    <!--    КОНЕЦ БЛОК 1 КОМПЛЕКТАЦИЯ _________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 2 КУЗОВ _______________________________________________________________     -->
    <div id="block2">
        <div class="options" id="options2">
            <div class="block-title">
                Тип кузова
            </div>

            <?php
            Lib\Calklib\getData\sectionWithRadioBuilder($bodytypes, 'bodytype', $logError);
            ?>

            <br><br>
        </div>
        <div id="preview1" class="preview">
            <img width="320" src="img/bodytype/hetchbek.jpg" class="main-image img-block" id="image1" alt="FordFocus">
        </div>
    </div>
    <!--    КОНЕЦ БЛОК 2 КУЗОВ _______________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 3 МОЩНОСТЬ ___________________________________________________________     -->
    <div id="block3">
        <div class="options" id="options3">
            <div class="block-title">
                Двигатель и трансмиссия
            </div>

            <?php
            Lib\Calklib\getData\sectionWithRadioBuilder($powers, 'power', $logError);
            ?>

            <br><br>
        </div>
        <div id="preview1" class="preview">
            <br><br>
            <img width="320" src="img/power/power.jpg" class="main-image img-block" id="image2" alt="FordFocus">
        </div>
    </div>
    <!--    КОНЕЦ БЛОК 3 МОЩНОСТЬ ____________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 4 ЦВЕТ ___________________________________________________________     -->
    <div id="block4">
        <div class="options" id="options4">
            <div class="block-title">
                Цвет автомобиля
            </div>

            <?php
            Lib\Calklib\getData\sectionWithRadioBuilder($colors, 'color', $logError);
            ?>
            <br><br>
        </div>
        <div id="preview1" class="preview">
            <img width="320" src="img/color/white.jpg" class="main-image img-block" id="image3" alt="FordFocus">
        </div>
    </div>
    <!--    КОНЕЦ БЛОК 4 ЦВЕТ ____________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 5 ИНТЕРЬЕР ___________________________________________________________     -->

    <div id="block5">
        <div class="options" id="options5">
            <div class="block-title">
                Отделка салона
            </div>

            <?php
            Lib\Calklib\getData\sectionWithRadioBuilder($furnishs, 'furnish', $logError);
            ?>
            <br><br>
        </div>
        <div id="preview1" class="preview">
            <img width="320" src="img/furnish/twist.png" class="main-image img-block" id="image4" alt="FordFocus">
        </div>
    </div>

    <!--    КОНЕЦ БЛОК 5 ИНТЕРЬЕР ____________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 6 Дополнительные опции _______________________________________________     -->

    <div id="block6">
        <div class="options" id="options6">
            <div class="block-title">
                Дополнительные опции
            </div>

            <?php
            Lib\Calklib\getData\sectionWithCheckboxBuilder($dops, 'dop', $logError);
            ?>
            <br><br>
        </div>
        <div id="preview1" class="preview">
            <br><br><br><br><br><br><br><br>
            <img width="320" src="img/dop/warm_sits.png" class="main-image img-block" id="image5" alt="FordFocus">
        </div>
    </div>
    <!--    КОНЕЦ БЛОК 6 Дополнительные опции ________________________________________________     -->
</form>