<?php
// подключение к БД
require "connectDB.php";
require_once("Position.php");
$viewData = new position;
$viewData -> ViewClient();
//$mas = $viewData -> $result;
/*echo '<div class="container" style="border:1px solid #cecece;">';
echo '<form action="delite.php" method="POST">';
echo '<table border="1">';

foreach ($viewData->$result as $key) {
    echo'<tr>';
    echo '<td>'.$key->number.'</td>';
    //$num = $key->number;
    echo '<td>'.$key->name.'</td>';
    //echo '<td><a href="/example/"><button>Удалить</button></a></td>';
    echo '<td><input type="radio" name="formDoor[]" value="'.$key->number.'"></td>';
    //print_r ($key->number.'-'.$key->name);
    //echo $key->name.'-';
    //echo '</br>';
    echo '</tr>' ;
}

echo '</table>';
echo '<input type="submit" value="Удалить">';
echo ' </form>';
echo '</div>';*/




?>

<html>
    <form action="add.php" method="POST"> 
    <lable>Введите данные</lable></br>
    <input type="text" size="40" name="number">
    <input type="text" size="40" name="name"></br>
   <input type="submit" value="Добавить">
    </form>


    <form action="search.php" method="POST"> 
    <lable>Введите</lable></br>
    <input type="text" size="40" name="name">
   <input type="submit" value="Найти">
    </form>
</html>