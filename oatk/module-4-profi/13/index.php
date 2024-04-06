<?php
$host = 'localhost';
$user = 'root';
$db = 'task';
$password = '';
$connection = new mysqli($host, $user, $password, $db);
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_POST["link"])) {
    $link = $_POST["link"];
    function r_link()
    {
        $symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        return $symbols[rand(0, strlen($symbols))];
    }

    $link_hash = r_link() . r_link() . r_link() . r_link() . r_link();
    $res_add = $connection->query("INSERT INTO `link`(`id`, `link`, `link_hash`) VALUES (NULL, '$link', '$link_hash')");
    $msg = "Перейдите по /?link=$link_hash";
} else {
    $msg = "";
}
if (isset($_GET["link"])) {
    $link_hash = $_GET['link'];
    $res = $connection->query("SELECT * FROM `link` WHERE `link_hash` = '$link_hash'");
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $link = $row['link'];
        }
        header("Location: $link");
    } else {
        $msg = "Ссылки не существует";
    }
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
    <input type="text" class="link" name="link" placeholder="Ссылка"/>
    <button type="submit" class="btn">Сократить</button>
    <?php print_r($msg); ?>
</form>
</body>
</html>