<?php
// подключение к БД
require "connectDB.php";
// подключение к файлу с методами
require_once("Position.php");
$viewData = new position;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>

   <h3>Добавление новых клиентов</h3>    

   <form action="add.php" method="POST"> 
       <lable>Введите номер телефона</lable></br>
       <input type="number" size="20" name="number" maxlength="11" required></br>
       <lable>Введите имя</lable></br>
       <input type="text" size="20" name="name" required></br>
       <input type="submit" value="Добавить">
   </form>

   <h3>Поиск клиентов</h3> 
    
    <form action="search.php" method="POST"> 
        <lable>Введите имя или номер</lable></br>
        <input type="text" size="40" name="value" required>
        <input type="submit" value="Найти">
    </form>

    <h2>Список клиентов</h2>
    <?$viewData -> ViewClient();?>
    
</body>
</html>