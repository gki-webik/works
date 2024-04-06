<?php
$arr = ["Цитата N1", "Цитата N2", "Цитата N3", "Цитата N4", "Цитата N5", "Цитата N6", "Цитата N7", "Цитата N8", "Цитата N9", "Цитата N10"];
$citata = $arr[rand(0, count($arr))];
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
<blockquote>
    <?php print_r($citata); ?>
</blockquote>
<form action="">
    <button type="submit" class="btn">Новая цитата</button>
</form>
<script>
    setInterval(() => {
        document.location.reload();
    }, 30000);
</script>
</body>
</html>