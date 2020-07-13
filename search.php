<?php
// проверка POST запроса
if ($_POST["value"]){
    $value = $_POST["value"];
}else{
    echo '<p>Произошла ошибка, данные не были переданны</p>';
    echo "<a href=index.php>Вернутся на главную страницу</a>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
</head>
<body>
    <h2>Результаты поиска</h2>
  <div class="container" style="border:1px solid #cecece;">
   <?
   require_once("Position.php");
   echo 'Поиск по: '.$value;
   $serch_client = new Position;
   $serch_client -> searchClient($value);
   
 ?> 
  </div>
  <a href=index.php>Вернутся на главную страницу</a>
</body>
</html>