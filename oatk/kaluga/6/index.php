<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $array1 = array(10, 15, 20, 25);
    $array2 = array(10, 15, 100, 150);
    $output = array_merge(array_diff($array1, $array2), array_diff($array2, $array1));
    echo json_encode($output);
    ?>
</body>

</html>