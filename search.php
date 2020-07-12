<?php
// проверка POST запроса
if ($_POST["name"]){
    $name = $_POST["name"];
    //header("Location: http://testtaskphp/index.php");
}else{
    $text = null;
}
require_once("Position.php");
echo 'Результаты поиска';
$serch_client = new Position;
$serch_client -> searchClient($name);

echo "<a href=index.php>Вернутся на главную страницу</a>";

?>