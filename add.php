<?php
// проверка POST запроса
if ($_POST["number"] and $_POST["name"]){
    $number = $_POST["number"];
    $name = $_POST["name"];
    header("Location: http://testtaskphp/index.php");
}else{
    $text = null;
}

require_once("Position.php");

$add_client = new Position;
$add_client -> AddClient($number, $name);



?>