//Выполняем после полной загрузки страницы
$(function () {
    "use strict";

    function abc2(n) {
        n += "";
        n = new Array(4 - n.length % 3).join("U") + n;
        return n.replace(/([0-9U]{3})/g, "$1 ").replace(/U/g, "");
    }

    //Инициализируем стоимости всех выбранных опций и устанавливаем итоговую цену равную их сумме
    var
        seriesCost = parseFloat($('input[name="series"]:checked')
            .parents('div[class="option"]').find('input[type="hidden"]').attr('id')),
        bodytypeCost = parseFloat($('input[name="bodytype"]:checked')
            .parents('div[class="option"]').find('input[type="hidden"]').attr('id')),
        powerCost = parseFloat($('input[name="power"]:checked')
            .parents('div[class="option"]').find('input[type="hidden"]').attr('id')),
        colorCost = parseFloat($('input[name="color"]:checked')
            .parents('div[class="option"]').find('input[type="hidden"]').attr('id')),
        furnishCost = parseFloat($('input[name="furnish"]:checked')
            .parents('div[class="option"]').find('input[type="hidden"]').attr('id')),
        dopCost = 0,
        finallyCost;

    $("input:checkbox").each(function (index, el) {
        var
            element = $(el),
            cost = element.parents('div[class="option"]').find('input[type="hidden"]').next().attr('value');
        if (element.is(":checked")) {
            cost = parseFloat(cost);
            dopCost += cost;
        }

    });

    finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
    $('#cost_block').html(abc2(finallyCost) + ' руб');

    //меняем цену при выборе комплектации
    $('input[name="series"]').change(function () {
        seriesCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
        //Меняем фоточки при переключении радиокнопки
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image').attr('src', newImage);
    });
    //Меняем фото при наведении
    $('#options1').on("mouseover", "div.option", function () {
        var newImage = $(this).children('input[type="hidden"]').attr('value');
        $('#image').attr('src', newImage);
    });
    //Устанавливаем выбранное фото по mouseleave
    $('#options1').on("mouseleave", "div.option", function () {
        var newImage = $('input[name="series"]:checked').parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image').attr('src', newImage);
    });


    //меняем цену при выборе кузова
    $('input[name="bodytype"]').change(function () {
        bodytypeCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
        //Меняем фоточки при переключении радиокнопки
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image1').attr('src', newImage);
    });
    //Меняем фото при наведении
    $('#options2').on("mouseover", "div.option", function () {
        var newImage = $(this).children('input[type="hidden"]').attr('value');
        $('#image1').attr('src', newImage);
    });
    //Устанавливаем выбранное фото по mouseleave
    $('#options2').on("mouseleave", "div.option", function () {
        var newImage = $('input[name="bodytype"]:checked').parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image1').attr('src', newImage);
    });

    //меняем цену при выборе двигателя
    $('input[name="power"]').change(function () {
        powerCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image2').attr('src', newImage);
    });
    //Меняем фото при наведении
    $('#options3').on("mouseover", "div.option", function () {
        var newImage = $(this).children('input[type="hidden"]').attr('value');
        $('#image2').attr('src', newImage);
    });
    //Устанавливаем выбранное фото по mouseleave
    $('#options3').on("mouseleave", "div.option", function () {
        var newImage = $('input[name="power"]:checked').parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image2').attr('src', newImage);
    });

    //меняем цену при выборе цвета
    $('input[name="color"]').change(function () {
        colorCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image3').attr('src', newImage);
    });
    //Меняем фото при наведении
    $('#options4').on("mouseover", "div.option", function () {
        var newImage = $(this).children('input[type="hidden"]').attr('value');
        $('#image3').attr('src', newImage);
    });
    //Устанавливаем выбранное фото по mouseleave
    $('#options4').on("mouseleave", "div.option", function () {
        var newImage = $('input[name="color"]:checked').parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image3').attr('src', newImage);
    });

    //меняем цену при выборе интерьера
    $('input[name="furnish"]').change(function () {
        furnishCost = parseFloat($(this).parents('div[class="option"]').find('input[type="hidden"]').attr('id'));
        finallyCost = seriesCost + bodytypeCost + powerCost + colorCost + furnishCost + dopCost;
        $('#cost_block').html(abc2(finallyCost) + ' руб');
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image4').attr('src', newImage);
    });
    //Меняем фото при наведении
    $('#options5').on("mouseover", "div.option", function () {
        var newImage = $(this).children('input[type="hidden"]').attr('value');
        $('#image4').attr('src', newImage);
    });
    //Устанавливаем выбранное фото по mouseleave
    $('#options5').on("mouseleave", "div.option", function () {
        var newImage = $('input[name="furnish"]:checked').parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image4').attr('src', newImage);
    });

    $('input[type="checkbox"]').change(function () {

        //При смене переключателя меняем картинку
        var newImage = $(this).parents('div[class="option"]').find('input[type="hidden"]').attr('value');
        $('#image5').attr('src', newImage);

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

    $('#options6').on("mouseover", "div.option", function () {
        var newImage = $(this).children('input[type="hidden"]').attr('value');
        $('#image5').attr('src', newImage);
    });


    // Обработчики нажатия на кнопку submit
    $('input[type="submit"]').on('click', function (e) {
        // Предотвращаем обычное поведение элемента
        e.preventDefault();
    });

    $('#submit-series').on('click', function () {
        $('#block2').css('display', 'flex');
        $('#submit-series').hide();
    });


    $('#submit-bodytype').on('click', function () {
        $('#block3').css('display', 'flex');
        $('#submit-bodytype').hide();
    });


    $('#submit-power').on('click', function () {
        $('#block4').css('display', 'flex');
        $('#submit-power').css('display', 'none');
    });


    $('#submit-color').on('click', function () {
        $('#block5').css('display', 'flex');
        $('#submit-color').css('display', 'none');
    });


    $('#submit-furnish').on('click', function () {
        $('#block6').css('display', 'flex');
        $('#submit-furnish').css('display', 'none');
    });

    $('#show-result').on('click', function () {
        $("#form-block").submit();
    });
});
