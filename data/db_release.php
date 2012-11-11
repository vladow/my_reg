<?php

global $db_existt;
echo "Инициализация базы данных...<br />";
if (mysql_connect("$HOST", "$USER", "$PASS"))
    echo 'Готово!<br />';
else echo 'Не удается подключить базу данных MySQL<br />';

//проверка на существование базы данных с таким именем
function db_exist($db_name) {

    $db_list = mysql_list_dbs();
    $i = 0;
    $cnt = mysql_num_rows($db_list);
    echo "Подключение к базе данных...<br />";
    echo "Вывожу список существующих БД...<br />";
    while ($i < $cnt) {
        echo "БД №" . $i . " = " . mysql_db_name($db_list, $i) . "<br />";
        if (mysql_db_name($db_list, $i) == $db_name) {
            $db_existt = 0;
        } else {
            $db_existt = 1;
            
        }
        $i++;
    };
}

;

//создание базы данных 
db_exist($db_name);
if ($db_existt == 0) {
    echo "Создаю базу данных...";
    $query = "CREATE DATABASE $db_name";

    if (mysql_query($query)) {
        echo "Готово! <br />";
    } else {
        echo
        "Произошла ошибка при создании базы данных MySQL: " . mysql_error() . "<br />";
    };
}  else {
    echo 'Указанная база данных уже существует<br />';    
};
//выбор БД с именем $db_name
mysql_select_db($db_name);
echo "Текущая база данных: " . $db_name . "<br />";
echo "Создаю таблицу пользователей...";
$query = "CREATE TABLE $db_user_table ( 
`u_id` int(11) unsigned NOT NULL auto_increment, 
`u_name` varchar(30) NOT NULL, 
`u_pass` varchar(32) NOT NULL, 
`u_hash` varchar(32) NOT NULL,  
PRIMARY KEY (`u_id`) 
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1";
if (mysql_query($query)) {
    echo 'Готово!';
} else {
    echo 'Произошла ошибка при создании таблицы пользователей: ' . mysql_error() . "<br />";
};
?>