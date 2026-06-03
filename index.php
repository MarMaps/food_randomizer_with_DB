<?php
error_reporting(0);

$con=pg_connect('host=localhost port=5432 dbname=chto_gotovit user=postgres password=123456');

$sql="select * from bluda";

$result=pg_query($con,$sql);
$n=pg_num_rows($result);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица блюд</title>
</head>

<body>
    <h3>Блюда</h3>
    <table class='table' border='7' cellpadding='5'>
        <tr>
            <th>Название блюда</th>
        </tr>

        <?php
        for($i=0; $i<$n; $i++) {
            $row=pg_fetch_object($result);
            $nazvanie = $row->nazvanie;
            
            print "<tr>
                    <td>$nazvanie</td>
                </tr>";
        }
        pg_close($con);
        ?>
    
    </table>


</body>
