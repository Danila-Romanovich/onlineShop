<?php
    //$db = new PDO('mysql:host=localhost;dbname=onlineShop', 'root', '');
    $host = "localhost"; // адрес сервера базы данных
    $user = "root"; // имя пользователя базы данных
    $password = ""; // пароль пользователя базы данных
    $database = "onlineShop"; // название базы данных
    $conn = mysqli_connect($host, $user, $password, $database);
?>