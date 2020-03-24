<?php
    include_once "test.php";

?>

    <!doctype html>
    <html lang="ru">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>testPHP</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>

        <h3>Тестовое задание PHP&SQL</h3>

        <button type="button" id="btnText">Скрыть случайный текст</button>
        <button type="button" id="btnTextShow">Показать случайный текст</button>

        <div class="textContainer">
            <br>
            <br>
            <br>
            <form action="test.php" method="POST">
                <input name="textVal" class="textCont" type="textar" value="<?php echo $final_string; ?>" style="width: 800px; border: none">
            </form>
            <br>
            <br>
            <br>
        </div>

        <button type="button" id="btnMassShow">Показать массив</button>
        <button type="button" id="btnMass">Скрыть массив</button>

        <div class="massiveText">
            <?
                $i = 1;
                foreach($arr as $a) {
                    echo '№' . $i . ' ' . $a . '<br/>';
                    $i++;
                }
            ?>
        </div>

    <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#btnText').on('click', function() {
                $('.textContainer').css('display', 'none');
            })
            $('#btnTextShow').click(function() {
                $('.textContainer').css('display', 'block');
            })
            $('#btnMass').on('click', function() {
                $('.massiveText').css('display', 'none');
            })
            $('#btnMassShow').click(function() {
                $('.massiveText').css('display', 'block');
            })
        });
    </script>




    </body>
    </html>
