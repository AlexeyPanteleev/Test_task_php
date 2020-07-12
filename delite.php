<?php
if ($_GET['id_clients']){
    $id_clients = $_GET['id_clients'];
    header("Location: http://testtaskphp/index.php");
}else{
    $text = null;
}

require_once("Position.php");
$del_client = new Position;
$del_client ->DelitClient($id_clients);


?>