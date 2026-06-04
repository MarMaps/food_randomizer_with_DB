<?php
error_reporting(0);

$con=pg_connect('host=localhost port=5432 dbname=chto_gotovit user=postgres password=123456');
$result = null;

    if (isset($_POST['btn'])) {
        $sql="select id, nazvanie from bluda order by random() limit 1";
        $result=pg_query($con,$sql);
        $row = pg_fetch_assoc($result);

    }
pg_close($con);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рандомайзер блюд</title>
</head>

<body>
    <h3>Сгенерировать блюдо</h3>
        <form method="post" action="">
            <input class="btn_dob" name='btn' type='submit' value='Сгенерировать'>
        </form>
    <?php 
    if (isset($_POST['btn'])) {
        echo "<h2>$row[nazvanie]</h2>";
    }
    ?>
</body>