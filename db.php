<?php
    /*
     * Инициализация подключения к базе данных
     *
     */

    $dblocational = "127.0.0.1";
    $dbname = "testworkphp";
    $dbuser = "root";
    $dbpasswd = "";

    $db = new mysqli($dblocational, $dbuser, $dbpasswd, $dbname);

    // Проверка соединения
    if($db->connect_errno) {
        die('Соединение не удалось: Код ошибки: '.$db->connect_errno.' - '.$db->connect_error);
    }

    // Установка кодировки соединения
    if(!$db->set_charset("utf8")) {
        die('Ошибка при загрузке набора символов utf8: '.$db->errno.' - '.$db->error);
    }

?>