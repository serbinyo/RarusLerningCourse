<form action="/" id="form-block" method="post">

    <!--    НАЧАЛО БЛОК 1 КОМПЛЕКТАЦИЯ ________________________________________________________    -->
    <div id="block1">
        <div class="block-title">
            Комплектация
        </div>

        <?php

        $cost = 0.00;

        //будем использовать счетчик для отметки первого элемента как checked
        $i = 0;
        foreach ($series as $serie) {
            $checked = '';
            if ($i === 0) {
                $checked = 'checked';
                $cost = $serie['cost'];
            }

            //подготавливаем данные для следующей страницы
            /** Переменная $series_data:
             *
             * array Текущая стоимость и наименование выбранной комплектации
             */
            $series_data = $serie['name'] . '?' . $serie['cost'];

            echo '<div class="option">';

            echo '<label class="radio">';
            echo "<input type='radio' name='series' value = '" . $series_data . "'" . $checked . " >\n";
            echo "<div class='radio__text'>" . $serie['name'] . '</div>';
            echo '</label>';

            //следующая строка для JS для изменения цены и картинки
            echo "<input type='hidden' id='" . $serie['cost'] . "' value='" . $serie['img'] . "' >\n";

            echo "</div><br>\n";
            $i++;
        }
        if ($i !== 0) {
            echo '<input type="submit" class="submit-btn" id="submit-series" value="Далее">';
        } else {
            $logError->error('Ошибка. Нет данных', ['table' => 'series']);
            echo '<p>Ошибка. Нет данных.</p>';
        }
        ?>

        <br><br>
    </div>
    <!--    КОНЕЦ БЛОК 1 КОМПЛЕКТАЦИЯ _________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 2 КУЗОВ _______________________________________________________________     -->
    <div id="block2">
        <div class="block-title">
            Тип кузова
        </div>

        <?php
        //будем использовать счетчик для отметки первого элемента как checked
        $i = 0;
        foreach ($bodytypes as $bodytype) {

            $checked = ($i === 0) ? 'checked' : '';

            /** Переменная $bodytype_data:
             *
             * array Текущая стоимость и наименование выбранного типа кузова
             */
            $bodytype_data = $bodytype['name'] . '?' . $bodytype['cost'];

            echo '<div class="option">';

            echo '<label class="radio">';
            echo "<input type='radio' name='bodytype' value='"
                . $bodytype_data . "' " . $checked . " >\n";
            echo '<div class="radio__text">' . $bodytype['name'] . '</div>';
            echo '</label>';

            //следующая строка для JS
            echo "<input type='hidden' id='" . $bodytype['cost']
                . "' value='" . $bodytype['img'] . "' >";

            echo "</div><br>\n";
            $i++;
        }

        if ($i !== 0) {
            echo '<input type="submit" class="submit-btn" id="submit-bodytype" value="Далее">';
        } else {
            $logError->error('Ошибка. Нет данных', ['table' => 'bodytype']);
            echo '<p>Ошибка. Нет данных.</p>';
        }
        ?>

        <br><br>
    </div>
    <!--    КОНЕЦ БЛОК 2 КУЗОВ _______________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 3 МОЩНОСТЬ ___________________________________________________________     -->
    <div id="block3">
        <div class="block-title">
            Двигатель и трансмиссия
        </div>

        <?php
        $i = 0;

        foreach ($powers as $power) {

            $checked = ($i === 0) ? 'checked' : '';

            /** Переменная $power_data:
             *
             * array Текущая стоимость наименование выбранного двигателя и трансмиссии
             */
            $power_data = $power['name'] . '?' . $power['cost'];

            echo '<div class="option">';

            echo '<label class="radio">';
            echo "<input type='radio' name='power' value='"
                . $power_data . "' " . $checked . " >\n";
            echo "<div class='radio__text'>" . $power['name'] . '</div>';
            echo '</label>';

            //следующая строка для JS
            echo "<input type='hidden' id='" . $power['cost']
                . "' value='" . $power['img'] . "' >";

            echo "</div><br>\n";
            $i++;
        }

        if ($i !== 0) {
            echo '<input type="submit" class="submit-btn" id="submit-power"  value="Далее"">';
        } else {
            $logError->error('Ошибка. Нет данных', ['table' => 'power']);
            echo '<p>Ошибка. Нет данных.</p>';
        }
        ?>

        <br><br>
    </div>
    <!--    КОНЕЦ БЛОК 3 МОЩНОСТЬ ____________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 4 ЦВЕТ ___________________________________________________________     -->
    <div id="block4">
        <div class="block-title">
            Цвет автомобиля
        </div>

        <?php
        //будем использовать счетчик для отметки первого элемента как checked
        $i = 0;
        foreach ($colors as $color) {

            $checked = ($i === 0) ? 'checked' : '';

            /** Переменная $color_data:
             *
             * array Текущая стоимость наименование выбранного лакокрасочного покрытия
             */
            $color_data = $color['name'] . '?' . $color['cost'];

            echo '<div class="option">';

            echo '<label class="radio">';
            echo "<input type='radio' name='color' value='"
                . $color_data . "' " . $checked . " >\n";
            echo "<div class='radio__text'>" . $color['name'] . '</div>';
            echo '</label>';

            //следующая строка для JS
            echo "<input type='hidden' id='" . $color['cost']
                . "' value='" . $color['img'] . "' >";

            echo "</div><br>\n";
            $i++;
        }

        if ($i !== 0) {
            echo '<input type="submit" class="submit-btn" name="color" id="submit-color" value="Далее">';
        } else {
            $logError->error('Ошибка. Нет данных', ['table' => 'color']);
            echo '<p>Ошибка. Нет данных.</p>';
        }
        ?>
        <br><br>
    </div>
    <!--    КОНЕЦ БЛОК 4 ЦВЕТ ____________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 5 ИНТЕРЬЕР ___________________________________________________________     -->

    <div id="block5">
        <div class="block-title">
            Отделка салона
        </div>

        <?php
        //будем использовать счетчик для отметки первого элемента как checked
        $i = 0;
        foreach ($furnishs as $furnish) {

            $checked = ($i === 0) ? 'checked' : '';

            /** Переменная $furnish_data:
             *
             * array Текущая стоимость и наименование выбранного интерьера
             */
            $furnish_data = $furnish['name'] . '?' . $furnish['cost'];

            echo '<div class="option">';

            echo '<label class="radio">';
            echo "<input type='radio' name='furnish' value='"
                . $furnish_data . "' " . $checked . " >\n";
            echo "<div class='radio__text'>" . $furnish['name'] . '</div>';
            echo '</label>';

            //следующая строка для JS
            echo "<input type='hidden' id='" . $furnish['cost']
                . "' value='" . $furnish['img'] . "' >\n";

            echo "</div><br>\n";
            $i++;
        }

        if ($i !== 0) {
            echo '<input type="submit" class="submit-btn" name="furnish" id="submit-furnish" value="Далее">';
        } else {
            $logError->error('Ошибка. Нет данных', ['table' => 'furnish']);
            echo '<p>Ошибка. Нет данных.</p>';
        }
        ?>
        <br><br>
    </div>

    <!--    КОНЕЦ БЛОК 5 ИНТЕРЬЕР ____________________________________________________________     -->

    <!--    НАЧАЛО БЛОК 6 Дополнительные опции _______________________________________________     -->

    <div id="block6">

        <div class="block-title">
            Дополнительные опции
        </div>

        <?php

        //будем использовать счетчик для отметки первого элемента как checked
        $i = 0;
        foreach ($dops as $dop) {

            echo '<div class="option">';

            echo "<label class='checkbox'>";
            //выводим опции
            echo "<input type='checkbox' name='" . $dop['name'] . "' value='"
                . $dop['id'] . "' >\n";
            echo "<div  class='checkbox__text'>" . $dop['name'] . '</div>';
            echo '</label>';

            //следующая строка для JS
            //echo "<input type='hidden' name='dop' >\n";
            echo "<input type='hidden' value='" . $dop['img'] . "' >\n";
            echo "<input type='hidden' value='" . $dop['cost'] . "' >\n";

            //отправляем в результат цену на Дополнительные опции
            echo "<input type='hidden' name='dop-cost' value='' >\n";

            echo "</div><br>\n";
            $i++;
        }

        if ($i !== 0) {
            echo '<input type="submit" class="submit-btn" id="show-result" value="Показать результат">';
        } else {
            $logError->error('Ошибка. Нет данных', ['table' => 'dop']);
            echo '<p>Ошибка. Нет данных.</p>';
        }
        ?>
        <br><br>
    </div>
    <!--    КОНЕЦ БЛОК 6 Дополнительные опции ________________________________________________     -->
</form>