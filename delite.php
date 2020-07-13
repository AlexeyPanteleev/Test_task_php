<?php
if ($_GET['id_clients']){
    $id_clients = $_GET['id_clients'];
    header("Location: http://testtaskphp/index.php");
}else{
    echo '<p>Произошла ошибка, данные не были переданны</p>';
    echo "<a href=index.php>Вернутся на главную страницу</a>";
}

require_once("Position.php");
$del_client = new Position;
$del_client ->DelitClient($id_clients);

?>