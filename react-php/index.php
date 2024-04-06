<?php
require 'db.php';

if (isset($_POST['register'])) {
    $user = insertUser($pdo);
    if ($user) {
        header("Location: data.php?hash=".$user['hash']);
        exit;
    } else {
        echo "Ошибка создания пользователя";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Зарегистрироваться</title>
</head>
<body>
    <form method="POST">
        <button type="submit" name="register">Зарегистрироваться</button>
    </form>
</body>
</html>
