<?php
   include_once "db.php";

   /*
    * Проверка соединения
    *
    */
    if($db)
        echo 'Соединение установлено.';
    else
        die('Ошибка подключения к серверу баз данных.');

    echo '<br>';



    /*
     * Решение Задания №1
     *
     */

    function random($array) {
        return mt_rand(0, count($array)-1);
    }

    function generateText() {
        $string = '{Пожалуйста,|Просто|Если сможете,} сделайте так, чтобы это '
            . '{удивительное|крутое|простое|важное|бесполезное} тестовое предложение '
            . '{изменялось {быстро|мгновенно|оперативно|правильно} '
            . 'случайным образом|менялось каждый раз}.';
        $back_bracket = explode('}', $string);
        $front_bracket1 = explode('{', $back_bracket[0]);
        $rand1 = explode('|', $front_bracket1[1]);          //Получаем массив - '0 - Пожалуйста, 1 - Просто, и т.д.'
        $front_bracket2 = explode('{', $back_bracket[1]);
        $str1 = $front_bracket2[0];                                 // Получаем - 'Сделайте так, чтобы это'
        $rand2 = explode('|', $front_bracket2[1]);         // Получаем массив - '0 - Удивительное, 1 - Крутое и т.д.'
        $front_bracket3 = explode('{', $back_bracket[2]);
        $str2 = $front_bracket3[0];                                 // Получаем - 'текстовое предложение'
        $str3 = $front_bracket3[1];                                 // Получаем - 'изменялось'
        $rand3 = explode('|', $front_bracket3[2]);         // Получаем массив - '0 - Быстро, 1 - Мгновенно, и т.д.'
        $rand4 = explode('|', $back_bracket[3]);           // Получаем массив - '0 - случайным образом, 1 - менялось каждый раз'


        if(random($rand4) == 1) {
            $final_string = $rand1[random($rand1)] . $str1 . $rand2[random($rand2)] .
                $str2 . $rand3[random($rand3)] . ' ' . $rand4[1] . '.';
        }
        else {
            $final_string = $rand1[random($rand1)] . $str1 . $rand2[random($rand2)] .
                $str2 . $str3 . $rand3[random($rand3)] . $rand4[0] . '.';
        }
        return $final_string;
    }

    echo '<br>';
    $final_string = generateText();
    echo $final_string;
    echo '<br>';


    /*
     * Решение Задания №2
     *
     */


    $arr = [];
    //Расчет количества вариантов = 3 * 1 * 5 * 1 * 2 * 4 * 1 = 120 штук
    while(count($arr) < 120) {
        if($arr == null) {
            $final_string = generateText();
            $arr[] = $final_string;
        }
        else {
            while(in_array($final_string, $arr)) {
                $final_string = generateText();
            }
            $arr[] = $final_string;
        }
    }


    /*
     * Решение Задания №3
     *
     */

    function sentIntobase() {
        global $db;
        global $arr;

        foreach($arr as $val) {
            $result = mysqli_query( $db, "SELECT COUNT(*) as count FROM `allvariable` WHERE ( `Variable` = '$val' )" );
            $row = mysqli_fetch_assoc( $result );
            if ( $row['count'] > 0 ) {
            }
            else {
                mysqli_query($db, "INSERT INTO `allvariable` (`Variable`) VALUES('$val')");
            }
        }

    }

    sentIntoBase();


?>


