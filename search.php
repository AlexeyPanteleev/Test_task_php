<?php
/**
 * Проверка на коректность POST запроса и создание переменной 
 * с переданными данными для поиска в БД.
 */
if ($_POST["value"]){
    $value = $_POST["value"];
}else{
    echo '<p>Произошла ошибка, данные не были переданны</p>';
    echo "<a href=index.php>Вернутся на главную страницу</a>";
}

/**
 * HTM код для коректного отображения информации на странице.
 */
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
   /**
    * Подключение файла с классом и необходимым методом,
    * создание экземпляра класса и обращение к методу 
    * поиска данных в БД.
    */
   require_once("Position.php");
   echo 'Поиск по: '.$value.'</br>';
   $serch_client = new Position;
   $serch_client -> searchClient($value);
   
   ?> 

  </div>
  <a href=index.php>Вернутся на главную страницу</a>
</body>
</html>