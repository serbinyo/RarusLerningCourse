<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <title>YABS admin</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="style.css?v=0.1" rel="stylesheet">
    <script src="jquery-3.4.0.js"></script>
</head>

<body>

<div class="wrapper">

    <header class="header">
        <div class="title">
            <h2>
                Yet Another Bonus Service.
                <br>Панель администратора.
            </h2>
        </div>
    </header><!-- .header-->

    <div class="middle">

        <div class="container">
            <main class="content">

                <div>
                    <label> Логин:
                        <input type='text' id="login">
                    </label>
                    <label> Пароль:
                        <input type='password' id="password">
                    </label>
                </div>
                <br><br>

                <div id="filters">

                    <div id="filters-num-block">
                        <label for="filters-num">Номер карты или телефона:
                            <input id="filters-num" type="text">
                        </label>
                    </div>

                    <div id="filters-date-block">
                        <!--                        Оба поля необоходимы к заполнению:<br>-->
                        <label for="filters-date-from">Дата от
                            <input id="filters-date-from" type="text" placeholder="ГГГГ-ММ-ДД">
                        </label><br><br>

                        <label for="filters-date-to">Дата до
                            <input id="filters-date-to" type="text" placeholder="ГГГГ-ММ-ДД">
                        </label>
                    </div>

                    <div id="filters-quantity-block">
                        <label for="filters-quantity">Только количество
                            <input id="filters-quantity" type="checkbox">
                        </label>
                    </div>

                    <a id="button-show-card" href="#">Поиск карты</a>
                    <a id="button-show-cards" href="#">Получить карты</a>
                    <a id="button-show-history" href="#">История операций</a>
                    <a id="button-show-turnover" href="#">Показать общий оборот (в том числе без карт)</a>
                    <a id="button-show-turnover-cards" href="#">Показать оборот по карам</a>
                    <a id="button-show-bonuses" href="#">Всего бонусов на картах</a>
                    <a id="button-bonus-credit" href="#">Количество начисленных бонусов</a>
                    <a id="button-bonus-debit" href="#">Количество списанных бонусов</a>
                    <a id="button-delete-card" href="#">Удалить карту из системы</a>

                    <div id="update-discount-section">
                        <form id="update-discount-form">
                            <label for="update-discount-value">Процент скидки
                                <input type="number" id="update-discount-value" min="0" max="100">
                            </label>
                        </form>
                        <a id="button-update-discount" href="#">Изменить процент скидки</a>
                    </div>

                    <div id="update-bonuses-section">
                        <form id="update-bonuses-form">
                            <label for="update-bonuses-value">Количество бонусов
                                <input type="number" id="update-bonuses-value">
                            </label>
                        </form>
                        <a id="button-update-bonuses" href="#">Изменить количество бонусов</a>
                    </div>

                    <div id="update-status-section">
                        <form id="update-status-form">
                            <label for="update-status-value">Статус карты
                                <input type="text" id="update-status-value">
                            </label>
                        </form>
                        <a id="button-update-status" href="#">Изменить статус карты</a>
                    </div>

                    <div id="create-card-section">
                        <form>
                            <label for="create-card-num">Номер новой карты
                                <input type="number" id="create-card-num">
                            </label>
                            <br><br>
                            <label for="create-card-lastname">Фамилия
                                <input type="text" id="create-card-lastname">
                            </label>
                            <br><br>
                            <label for="create-card-firstname">Имя
                                <input type="text" id="create-card-firstname">
                            </label>
                            <br><br>
                            <label for="create-card-middlename">Отчество
                                <input type="text" id="create-card-middlename">
                            </label>
                            <br><br>
                            <label for="create-card-birthday">Дата рождения
                                <input type="text" id="create-card-birthday" placeholder="ГГГГ-ММ-ДД">
                            </label>
                            <br><br>
                            <label for="create-card-phonenumber">Номер телефона
                                <input type="text" id="create-card-phonenumber" placeholder="11 цифр, без +">
                            </label>
                        </form>
                        <a id="button-create-card" href="#">Выпустить карту</a>
                    </div>

                    <div id="update-card-section">
                        <form>
                            <label for="update-card-lastname">Фамилия
                                <input type="text" id="update-card-lastname">
                            </label>
                            <br><br>
                            <label for="update-card-firstname">Имя
                                <input type="text" id="update-card-firstname">
                            </label>
                            <br><br>
                            <label for="update-card-middlename">Отчество
                                <input type="text" id="update-card-middlename">
                            </label>
                            <br><br>
                            <label for="update-card-birthday">Дата рождения
                                <input type="text" id="update-card-birthday" placeholder="ГГГГ-ММ-ДД">
                            </label>
                            <br><br>
                            <label for="update-card-phonenumber">Номер телефона
                                <input type="text" id="update-card-phonenumber" placeholder="11 цифр, без +">
                            </label>
                        </form>
                        <a id="button-update-card" href="#">Обновить данные по карте</a>
                    </div>

                    <div id="add-purchase-section">
                        <form>
                            <label for="purchase-section-text">Покупка:
                                <textarea id="purchase-section-text">
                                </textarea>
                            </label>
                            <br><br>
                            <label for="purchase-section-amount">Сумма:
                                <input type="number" id="purchase-section-amount">
                            </label>
                            <br><br>
                        </form>
                        <a id="button-add-purchase" href="#">Оформить покупку</a>
                    </div>

                    <div id="create-user-section">
                        <form>
                            <label for="create-user-login">Логин
                                <input type="text" id="create-user-login">
                            </label>
                            <br><br>
                            <label for="create-user-lastname">Фамилия
                                <input type="text" id="create-user-lastname">
                            </label>
                            <br><br>
                            <label for="create-user-firstname">Имя
                                <input type="text" id="create-user-firstname">
                            </label>
                            <br><br>
                            <label for="create-user-middlename">Отчество
                                <input type="text" id="create-user-middlename">
                            </label>
                            <br><br>
                            <label for="create-user-birthday">Дата рождения
                                <input type="text" id="create-user-birthday" placeholder="ГГГГ-ММ-ДД">
                            </label>
                            <br><br>
                            <label for="create-user-phonenumber">Номер телефона
                                <input type="text" id="create-user-phonenumber" placeholder="11 цифр, без +">
                            </label>
                            <br><br>
                            <label for="create-user-role">Должность
                                <input type="text" id="create-user-role">
                            </label>
                            <br><br>
                            <label for="create-user-password">Пароль
                                <input type="text" id="create-user-password">
                            </label>
                        </form>
                        <a id="button-create-user" href="#">Добавить сотрудника</a>
                    </div>

                    <div id="display"></div>

            </main><!-- .content -->
        </div><!-- .container-->

        <aside class="left-sidebar">
            <strong>Меню:</strong><br>
            <a id="show-card-option" href="#">Поиск карты</a><br>
            <a id="show-cards-option" href="#">Выборка карт</a><br>
            <a id="show-history-option" href="#">История операций</a><br>
            <a id="show-turnover-option" href="#">Показать общий оборот (в том числе без карт)</a><br>
            <a id="show-turnover-cards-option" href="#">Показать оборот по карам</a><br>
            <a id="show-bonuses-option" href="#">Всего бонусов на картах</a><br>
            <a id="bonus-credit-option" href="#">Количество начисленных бонусов</a><br>
            <a id="bonus-debit-option" href="#">Количество списанных бонусов</a><br>
            <a id="update-discount-option" href="#">Обновить процент скидки по карте</a><br>
            <a id="update-bonuses-option" href="#">Изменить число бонусов по карте на значение</a><br>
            <a id="update-status-option" href="#">Изменить статус карты</a><br>
            <a id="delete-card-option" href="#">Удаление карты</a><br>
            <a id="create-card-option" href="#">Выпуск новой карты</a><br>
            <a id="update-card-option" href="#">Обновление данных по карте</a><br>
            <a id="add-purchase-option" href="#">Оформление покупки</a><br>
            <a id="show-user-option" href="#">Список сотрудников</a><br>
            <a id="create-user-option" href="#">Добавление сотрудника</a><br>
        </aside><!-- .left-sidebar -->

    </div><!-- .middle-->

    <footer class="footer">

    </footer><!-- .footer -->

</div><!-- .wrapper -->

<script>

    $(function () {

        $('#show-card-option').on('click', function (e) {
            showFilters([true, false, false]);
            showButtons([true, false, false, false, false, false, false, false, false]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#show-cards-option').on('click', function (e) {
            showFilters([false, true, true]);
            $('#filters-num').val('');
            showButtons([false, true, false, false, false, false, false, false, false]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#show-history-option').on('click', function (e) {
            showFilters([true, true, true]);
            showButtons([false, false, true, false, false, false, false, false, false]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#show-turnover-option').on('click', function (e) {
            showFilters([false, true, true]);
            $('#filters-num').val('');
            showButtons([false, false, false, true, false, false, false, false, false]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#show-turnover-cards-option').on('click', function (e) {
            showFilters([true, true, true]);
            showButtons([false, false, false, false, true, false, false, false, false]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#show-bonuses-option').on('click', function (e) {
            let url;
            showFilters([false, false, false]);
            $('#filters-num').val('');
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, false, false, false, false, false, false]);
            url = 'http://bravo.rarus-crimea.ru/api/show/bonus';
            sendAjax(url);
        });

        $('#bonus-credit-option').on('click', function (e) {
            showFilters([false, true, false]);
            $('#filters-num').val('');
            showButtons([false, false, false, false, false, false, true, false, false]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#bonus-debit-option').on('click', function (e) {
            showFilters([false, true, false]);
            $('#filters-num').val('');
            showButtons([false, false, false, false, false, false, false, true, false]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#update-discount-option').on('click', function (e) {
            showFilters([true, false, false]);
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([true, false, false, false, false, false, false]);
        });

        $('#update-bonuses-option').on('click', function (e) {
            showFilters([true, false, false]);
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, true, false, false, false, false, false]);
        });

        $('#update-status-option').on('click', function (e) {
            showFilters([true, false, false]);
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, false, true, false, false, false, false]);
        });

        $('#delete-card-option').on('click', function (e) {
            showFilters([true, false, false]);
            showButtons([false, false, false, false, false, false, false, false, true]);
            showSections([false, false, false, false, false, false, false]);
        });

        $('#create-card-option').on('click', function (e) {
            showFilters([false, false, false]);
            $('#filters-num').val('');
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, false, false, true, false, false, false]);
        });

        $('#update-card-option').on('click', function (e) {
            showFilters([true, false, false]);
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, false, false, false, true, false, false]);
        });

        $('#add-purchase-option').on('click', function (e) {
            showFilters([true, false, false]);
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, false, false, false, false, true, false]);
        });

        $('#show-user-option').on('click', function (e) {
            let url;
            showFilters([false, false, false]);
            $('#filters-num').val('');
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, false, false, false, false, false, false]);
            url = 'http://bravo.rarus-crimea.ru/api/show/user';
            sendAjax(url);
        });

        $('#create-user-option').on('click', function (e) {
            showFilters([false, false, false]);
            showButtons([false, false, false, false, false, false, false, false, false]);
            showSections([false, false, false, false, false, false, true]);
        });

        //######################################################################

        $('#button-show-card').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/show/card';
            sendAjax(url);
        });

        $('#button-show-cards').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/show/card';
            sendAjax(url);
        });

        $('#button-show-turnover').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/show/turnover';
            sendAjax(url);
        });

        $('#button-show-history').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/show/history';
            sendAjax(url);
        });

        $('#button-show-turnover-cards').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/show/turnover/card';
            sendAjax(url);
        });

        $('#button-bonus-credit').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/show/bonus/credit';
            sendAjax(url);
        });

        $('#button-bonus-debit').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/show/bonus/debit';
            sendAjax(url);
        });

        $('#button-update-discount').on('click', function (e) {
            let url, discount, data;

            url = 'http://bravo.rarus-crimea.ru/api/update/discount';
            discount = $('#update-discount-value').val();
            data = {
                'discount': discount
            };
            sendAjaxPost(url, data);
        });

        $('#button-update-bonuses').on('click', function (e) {
            let url, bonuses, data;

            url = 'http://bravo.rarus-crimea.ru/api/update/bonus';
            bonuses = $('#update-bonuses-value').val();
            data = {
                'bonuses': bonuses
            };
            sendAjaxPost(url, data);
        });

        $('#button-update-status').on('click', function (e) {
            let url, status, data;

            url = 'http://bravo.rarus-crimea.ru/api/update/status';
            status = $('#update-status-value').val();

            if ('Активна' !== status && 'Заблокирована' !== status) {
                if ('active' !== status && 'blocked' !== status) {
                    alert("Статус может принимать значения 'Активна' или 'Заблокирована' только");
                }
            }

            data = {
                'status': status
            };
            sendAjaxPost(url, data);
        });

        $('#button-delete-card').on('click', function (e) {
            let url = 'http://bravo.rarus-crimea.ru/api/delete/card';
            sendAjax(url);
        });

        $('#button-create-card').on('click', function (e) {
            let url, num, lastName, firstName, middleName, birthday, phoneNumber, data;

            url = 'http://bravo.rarus-crimea.ru/api/add/card';
            num = $('#create-card-num').val();
            lastName = $('#create-card-lastname').val();
            firstName = $('#create-card-firstname').val();
            middleName = $('#create-card-middlename').val();
            birthday = $('#create-card-birthday').val();
            phoneNumber = $('#create-card-phonenumber').val();
            data = {
                'num'         : num,
                'last_name'   : lastName,
                'first_name'  : firstName,
                'middle_name' : middleName,
                'birthday'    : birthday,
                'phone_number': phoneNumber
            };

            sendAjaxPost(url, data);
        });

        $('#button-update-card').on('click', function (e) {
            let url, num, lastName, firstName, middleName, birthday, phoneNumber, data;

            url = 'http://bravo.rarus-crimea.ru/api/update/card';
            num = $('#filters-num').val();
            lastName = $('#update-card-lastname').val();
            firstName = $('#update-card-firstname').val();
            middleName = $('#update-card-middlename').val();
            birthday = $('#update-card-birthday').val();
            phoneNumber = $('#update-card-phonenumber').val();
            data = {
                'num'         : num,
                'last_name'   : lastName,
                'first_name'  : firstName,
                'middle_name' : middleName,
                'birthday'    : birthday,
                'phone_number': phoneNumber
            };

            sendAjaxPost(url, data);
        });

        $('#button-add-purchase').on('click', function (e) {
            let url, purchase, amount, data;

            url = 'http://bravo.rarus-crimea.ru/api/update/turnover';
            purchase = $('#purchase-section-text').val();
            amount = $('#purchase-section-amount').val();

            data = {
                'purchase': purchase,
                'amount'  : amount
            };

            sendAjaxPost(url, data);
        });

        $('#button-create-user').on('click', function (e) {
            let url, login, lastName, firstName, middleName, birthday, phoneNumber, role, password, data;

            url = 'http://bravo.rarus-crimea.ru/api/add/user';
            login = $('#create-user-login').val();
            lastName = $('#create-user-lastname').val();
            firstName = $('#create-user-firstname').val();
            middleName = $('#create-user-middlename').val();
            birthday = $('#create-user-birthday').val();
            phoneNumber = $('#create-user-phonenumber').val();
            role = $('#create-user-role').val();
            password = $('#create-user-password').val();
            data = {
                'login'       : login,
                'last_name'   : lastName,
                'first_name'  : firstName,
                'middle_name' : middleName,
                'birthday'    : birthday,
                'phone_number': phoneNumber,
                'position'    : role,
                'password'    : password,
            };

            sendAjaxPost(url, data);
        });

    });

    function sendAjax(url) {
        let username = $('#login').val(),
            password = $('#password').val();

        url = prepareUrl(url);

        $.ajax({
            url     : url,
            method  : 'GET',
            dataType: "json",

            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", "Basic " + btoa(username + ":" + password));
                xhr.setRequestHeader("contentType", "application/json;charset=UTF-8");
            },
            error     : function () {
                console.log('error');
            },
        }).done(function (msg) {
            let jsonString = JSON.stringify(msg, null, 2);
            $('#display').text(jsonString);
        });
    }

    function sendAjaxPost(url, data) {
        let username = $('#login').val(),
            password = $('#password').val();

        url = prepareUrl(url);

        $.ajax({
            url     : url,
            method  : 'POST',
            data    : data,
            dataType: "json",

            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", "Basic " + btoa(username + ":" + password));
                xhr.setRequestHeader("contentType", "application/json;charset=UTF-8");
            },
            error     : function () {
                $('#display').text('\"Operation error\"');
            },
        }).done(function (msg) {
            printDisplay(msg);
        });
    }

    function printDisplay(jsonData) {
        //TODO pretty print
        let jsonString = JSON.stringify(jsonData);
        $('#display').text(jsonString);
    }

    function cardFilter() {
        return $('#filters-num').val();
    }

    function isDateFilter() {
        return ($('#filters-date-from').val() && $('#filters-date-to').val());
    }

    function quantityFilter() {
        return $('#filters-quantity').prop('checked');
    }

    function prepareUrl(url) {
        if (cardFilter()) {
            url = url + '/' + cardFilter();
        }
        if (isDateFilter() && quantityFilter()) {
            url += '?count=quantity&from=' + $('#filters-date-from').val() + '&to=' + $('#filters-date-to').val();
        } else if (quantityFilter()) {
            url += '?count=quantity';
        } else if (isDateFilter()) {
            url += '?from=' + $('#filters-date-from').val() + '&to=' + $('#filters-date-to').val();
        }
        console.log(url);
        return url;
    }

    function showFilters($settingsArr) {
        if ($settingsArr[0]) {
            $('#filters-num-block').show('slow');
        } else {
            $('#filters-num-block').hide();
        }
        if ($settingsArr[1]) {
            $('#filters-date-block').show('slow');
        } else {
            $('#filters-date-block').hide();
        }
        if ($settingsArr[2]) {
            $('#filters-quantity-block').show('slow');
        } else {
            $('#filters-quantity-block').hide();
        }
    }

    function showButtons($settingsArr) {
        if ($settingsArr[0]) {
            $('#button-show-card').show('slow');
        } else {
            $('#button-show-card').hide();
        }
        if ($settingsArr[1]) {
            $('#button-show-cards').show('slow');
        } else {
            $('#button-show-cards').hide();
        }
        if ($settingsArr[2]) {
            $('#button-show-history').show('slow');
        } else {
            $('#button-show-history').hide();
        }
        if ($settingsArr[3]) {
            $('#button-show-turnover').show('slow');
        } else {
            $('#button-show-turnover').hide();
        }
        if ($settingsArr[4]) {
            $('#button-show-turnover-cards').show('slow');
        } else {
            $('#button-show-turnover-cards').hide();
        }
        if ($settingsArr[5]) {
            $('#button-show-bonuses').show('slow');
        } else {
            $('#button-show-bonuses').hide();
        }
        if ($settingsArr[6]) {
            $('#button-bonus-credit').show('slow');
        } else {
            $('#button-bonus-credit').hide();
        }
        if ($settingsArr[7]) {
            $('#button-bonus-debit').show('slow');
        } else {
            $('#button-bonus-debit').hide();
        }
        if ($settingsArr[8]) {
            $('#button-delete-card').show('slow');
        } else {
            $('#button-delete-card').hide();
        }
    }

    function showSections($settingsArr) {
        if ($settingsArr[0]) {
            $('#update-discount-section').show('slow');
        } else {
            $('#update-discount-section').hide();
        }
        if ($settingsArr[1]) {
            $('#update-bonuses-section').show('slow');
        } else {
            $('#update-bonuses-section').hide();
        }
        if ($settingsArr[2]) {
            $('#update-status-section').show('slow');
        } else {
            $('#update-status-section').hide();
        }
        if ($settingsArr[3]) {
            $('#create-card-section').show('slow');
        } else {
            $('#create-card-section').hide();
        }
        if ($settingsArr[4]) {
            $('#update-card-section').show('slow');
        } else {
            $('#update-card-section').hide();
        }
        if ($settingsArr[5]) {
            $('#add-purchase-section').show('slow');
        } else {
            $('#add-purchase-section').hide();
        }
        if ($settingsArr[6]) {
            $('#create-user-section').show('slow');
        } else {
            $('#create-user-section').hide();
        }
    }
</script>

</body>
</html>