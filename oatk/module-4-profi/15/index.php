<?php
$host = 'localhost';
$user = 'root';
$db = 'task';
$password = '';
$connection = new mysqli($host, $user, $password, $db);
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_COOKIE["visit"])) {
    $msg = "Ваш IP: $ip<br> Вы уже посещали данную страницу!";
} else {
    $res = $connection->query("SELECT * FROM `ip`");
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $visit_num = $row['visit'];
        }
        $visit_num += 1;
        $res_upd = $connection->query("UPDATE `ip` SET `visit` = '$visit_num' WHERE `ip` = '$ip'");
        setcookie("visit", "true", time() + 60 * 60 * 24, "/");
        $msg = "Ваш IP: $ip<br> У IP обновлена статистика посещения.";
    } else {
        $res_add = $connection->query("INSERT INTO `ip`(`id`, `ip`, `visit`) VALUES (NULL, '$ip', '1')");
        setcookie("visit", "true", time() + 60 * 60 * 24, "/");
        $msg = "Ваш IP: $ip<br> IP добавлен в бд!";
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
<div><?php print_r($msg); ?></div>
</body>
</html>