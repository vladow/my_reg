<?php

//проверка правильности логина и пароля
function account_valid($logpass) {

//допустимые символы 
    $char_valid = '1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm-_';
////минимальное количество символов 
    $char_min_length = 5;
////максимальное количество символов 
    $char_max_length = 25;

    if (strspn($_POST[$logpass], $char_valid) != strlen($_POST[$logpass])) {
        return false;
    }
    if (strlen($_POST[$logpass]) < $char_min_length) {
        return false;
    }
    if (strlen($_POST[$logpass]) > $char_max_length) {
        return false;
    }
    return true;
}

//ошибки
function valid($user_name) {
    global $err_m;

    if (account_valid('login') == FALSE) {
        $err_m = 'Неверный логин';
        return false;
    }
    if (account_valid('pass') == FALSE) {
        $err_m = 'Неверный пароль';
        return false;
    }
    if ($_POST['pass'] !== $_POST['pass2']) {
        $err_m = 'Пароли не совпадают';
        return false;
    }
    $query = "SELECT * FROM users WHERE u_name = '$user_name'";
    $result = mysql_query($query);
    if ($result && mysql_num_rows($result) > 0) {
        $err_m = 'Имя пользователя уже существует';
        return false;
    }
    return TRUE;
}

//заносим логин и пароль в базу данных
if (valid($user_name) == FALSE) {
    ?> <p id="err" class="message"> <?php echo $err_m; ?> </p>
    <?php
} else {
    $result = mysql_query("INSERT INTO $db_user_table (u_name, u_pass) VALUES ('$user_name', '$user_pass')");
    if ($result) {
        ?> <p id="err" class="message"><?php echo "Регистрация прошла успешно!"; ?> </p>
        <?php
    } else {
        echo "Ошибка при работе с базой данных. <br />";
        echo mysql_error();
    }
}
?>