<?php

/**
 * Проверка GET запроса и создание переменной хранящей
 * id выбранной записи. 
 */
if ($_GET['id_clients']){
    $id_clients = $_GET['id_clients'];
    header("Location: http://testtaskphp/index.php");
}else{
    echo '<p>Произошла ошибка, данные не были переданны</p>';
    echo "<a href=index.php>Вернутся на главную страницу</a>";
}

/**
 * Подключение файла с классом и необходимым методом и 
 * создание екземпляра класса для удаления выбранной информации из БД.
 */
require_once("Position.php");
$del_client = new Position;
$del_client ->DelitClient($id_clients);

?>