<?php
header('Content-type: text/html; charset=utf-8');
if (isset($_POST["chk1"]) || isset($_POST["chk2"]) || isset($_POST["chk3"]) || isset($_POST["chk4"]) || isset($_POST["chk5"]) || isset($_POST["psw_length"])) {
    if (isset($_POST["chk1"])) {
        $chk1 = "checked";
    } else {
        $chk1 = "";
    }
    if (isset($_POST["chk2"])) {
        $chk2 = "checked";
    } else {
        $chk2 = "";
    }
    if (isset($_POST["chk3"])) {
        $chk3 = "checked";
    } else {
        $chk3 = "";
    }
    if (isset($_POST["chk4"])) {
        $chk4 = "checked";
    } else {
        $chk4 = "";
    }
    if (isset($_POST["chk5"])) {
        $chk5 = "checked";
    } else {
        $chk5 = "";
    }
    function r_psw()
    {
        $symbols = "";
        if (isset($_POST["chk1"])) {
            $symbols .= "ABCDEFGHIJKLMNOPQRSTUVWXYZАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";
        }
        if (isset($_POST["chk2"])) {
            $symbols .= "abcdefghijklmnopqrstuvwxyzабвгдеёжзийклмнопрстуфхцчшщъыьэюя";
        }
        if (isset($_POST["chk3"])) {
            $symbols .= "0123456789@#!*&^%_-+=";
        }
        if (isset($_POST["chk4"])) {
            $symbols .= "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя";
        }
        if (isset($_POST["chk5"])) {
            $symbols .= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        }
        if (!isset($_POST["chk1"]) || !isset($_POST["chk2"]) || !isset($_POST["chk3"]) || !isset($_POST["chk4"]) || !isset($_POST["chk5"]) || !isset($_POST["psw_length"])) {
            $symbols .= "ABCDEFGHIJKLMNOPQRSTUVWXYZАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯabcdefghijklmnopqrstuvwxyzабвгдеёжзийклмнопрстуфхцчшщъыьэюя0123456789@#!*&^%_-+=";
        }
        return $symbols[rand(0, strlen($symbols))];
    }

    if (isset($_POST["psw_length"])) {
        $count = $_POST["psw_length"];
        $result = "";
        if ($count >= 1) {
            for ($i = 0; $i < $count; $i++) {
                $result .= r_psw();
            }
        } else {
            for ($i = 0; $i < 7; $i++) {
                $result .= r_psw();
            }
        }
    } else {
        $result = "";
        $count = "";
        for ($i = 0; $i < 7; $i++) {
            $result .= r_psw();
        }
    }
} else {
    $result = "";
    $count = "";
    $chk1 = "";
    $chk2 = "";
    $chk3 = "";
    $chk4 = "";
    $chk5 = "";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<form action="" class="main" method="POST">
    <input type="text" class="psw_result" placeholder="Нажмите на кнопку" value="<?php print_r($result) ?>"
           readonly/>
    <input type="number" min="1" class="psw_length" name="psw_length" value="<?php print_r($count) ?>"
           placeholder="Длина пароля"/>
    <div class="filter">
        <label><input type="checkbox" id="chk1" name="chk1" <?php print_r($chk1) ?>/> Верхний регистр</label>
        <label><input type="checkbox" id="chk2" name="chk2" <?php print_r($chk2) ?>/> Нижний регистр</label>
        <label><input type="checkbox" id="chk3" name="chk3" <?php print_r($chk3) ?>/> Спецсимволы</label>
        <label><input type="checkbox" id="chk4" name="chk4" <?php print_r($chk4) ?>/> Кириллица</label>
        <label><input type="checkbox" id="chk5" name="chk5" <?php print_r($chk5) ?>/> Латиница</label>
    </div>
    <button type="submit" class="btn_generate">Сгенерировать</button>
</form>
</body>
</html>