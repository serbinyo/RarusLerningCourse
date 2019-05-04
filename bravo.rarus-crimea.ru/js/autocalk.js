//Выполняем после полной загрузки страницы
$(function () {
    "use strict";

    function abc2(n) {
        n += "";
        n = new Array(4 - n.length % 3).join("U") + n;
        return n.replace(/([0-9U]{3})/g, "$1 ").replace(/U/g, "");
    }

    var
        seriesCost = parseFloat($('input[name="series"]:checked')
            .parents('div[class="option"]').find('input[type="hidden"]').attr('id')),
        bodytypeCost = 0,
        powerCost = 0,
        colorCost = 0,
        furnishCost = 0,
        dopCost = 0,
        finallyCost = 0;


    //Меняем фоточки при переключении радиокнопки
    $('input[type="radio"]').change(function () {
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image').attr('src', newImage);
    });


    //меняем цену при выборе комплектации
    $('input[name="series"]').change(function () {
        seriesCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
    });

    //меняем цену при выборе кузова
    $('input[name="bodytype"]').change(function () {
        bodytypeCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
    });

    //меняем цену при выборе двигателя
    $('input[name="power"]').change(function () {
        powerCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
    });

    //меняем цену при выборе цвета
    $('input[name="color"]').change(function () {
        colorCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
    });

    //меняем цену при выборе интерьера
    $('input[name="furnish"]').change(function () {
        furnishCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
    });

    $('input[type="checkbox"]').change(function () {

        //При смене переключателя меняем картинку
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image').attr('src', newImage);

        dopCost = 0;

        //И подсчитываем стоимость
        $("input:checkbox").each(function (index, el) {
            var
                element = $(el),
                cost = element.parents('div[class="option"]').find('input[type="hidden"]').next().attr('value');
            if (element.is(":checked")) {

                cost = parseFloat(cost);
                dopCost += cost;
            }

        });
        $('input[name="dop-cost"]').val(dopCost);
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
    });

    // Обработчики нажатия на кнопку submit
    $('input[type="submit"]').on('click', function (e) {
        // Предотвращаем обычное поведение элемента
        e.preventDefault();
    });

    $('#submit-series').on('click', function () {
        $('#block2').css('display', 'block');
        $('#submit-series').hide();
    });


    $('#submit-bodytype').on('click', function () {
        $('#block3').css('display', 'block');
        $('#submit-bodytype').hide();
    });


    $('#submit-power').on('click', function () {
        $('#block4').css('display', 'block');
        $('#submit-power').css('display', 'none');
    });


    $('#submit-color').on('click', function () {
        $('#block5').css('display', 'block');
        $('#submit-color').css('display', 'none');
    });


    $('#submit-furnish').on('click', function () {
        $('#block6').css('display', 'block');
        $('#submit-furnish').css('display', 'none');
    });

    $('#show-result').on('click', function () {
        $("#form-block").submit();
    });
});