<?php
$host = 'localhost'; // адрес сервера
$database = 'parser'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль


// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

// выполняем операции с базой данных
$query1 ="INSERT INTO `test_product` SET
                    `name` = '" . $title. "',
                    `code` = '".$code . "',
                   `price_0` = '".$price . "',
                   `quantity_0` = '". $quantity . "'";

$result1 = mysqli_query($link, $query1) or die("Error1 " . mysqli_error($link));


// закрываем подключение
mysqli_close($link);

