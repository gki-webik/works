<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .captcha {
            padding: 20px;
            background-color: #ddd;
            color: black;
            user-select: none;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input,
        button {
            padding: 10px;
        }

        .error {
            background-color: #ffbebe;
            color: red;
            padding: 15px 40px;
            text-align: center;
        }

        .success {
            background-color: #d7ffd6;
            color: green;
            padding: 15px 40px;
            text-align: center;
        }

        .is-none {
            display: none;
        }

        .is-block {
            display: block !important;
        }

        .box {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 300px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }
    </style>

    <?php
    session_start();
    if (isset($_POST["inputCapcha"]) && isset($_POST["type"]) && $_POST["type"] == "check") {
        if ($_SESSION["captcha"] == ($_POST["inputCapcha"])) {
            $isSuccess = "is-block";
            $isError = "";
        } else {
            $isSuccess = "";
            $isError = "is-block";
        }
    } else {
        $_SESSION["captcha"] = rand(1000, 999999);
        $isError = "";
        $isSuccess = "";
    }
    ?>
    <div class="box">
        <div class="captcha"><?php print_r($_SESSION["captcha"]) ?></div>
        <form action="" method="post">
            <input type="text" placeholder="Код" name="inputCapcha">
            <input type="text" name="type" hidden value="check">
            <button type="submit">Проверить капча</button>
        </form>
        <form action="" method="post">
            <input type="text" name="new" hidden value="check">
            <button type="submit">Новая капча</button>
        </form>
        <div class="error is-none <?php print_r($isSuccess); ?>">Капча не пройдена</div>
        <div class="success is-none <?php print_r($isError); ?>">Капча успешно пройдена</div>
    </div>
</body>

</html>