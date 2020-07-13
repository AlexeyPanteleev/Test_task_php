<?php
/**
 * Проверка на коректность POST запроса и создание переменных 
 * с переданными данными для внесения их в БД.
 */
if ($_POST["number"] and $_POST["name"]){
    $number = $_POST["number"];
    $name = $_POST["name"];
    header("Location: http://testtaskphp/index.php"); // перенаправление на главную страницу
}else{
    echo '<p>Произошла ошибка, данные не были переданны</p>';
    echo "<a href=index.php>Вернутся на главную страницу</a>";
}

/**
 * Подключение файла с классом и необходимым методом,
 * создание экземпляра класса и обращение к методу 
 * добавления данных клиента в БД.
 */
require_once("Position.php");

$add_client = new Position;
$add_client -> AddClient($number, $name);

?>