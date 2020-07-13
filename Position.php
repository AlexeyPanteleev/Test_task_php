<?php

class Position{
    //добавление клиента
    public function AddClient($number, $name)
    {
        require "connectDB.php";
        $query = "INSERT INTO `client` (number, name) VALUES ('$number', '$name')";
        $result = mysqli_query($mysqli, $query);
        
    }

    // просмотр списка клиентов
    public function ViewClient()
    {
        require "connectDB.php";
        $query = mysqli_query($mysqli, 'SELECT `id`, `number`, `name` FROM `client`');
        $i=1;
        echo "<table border='1'>";
        echo "<tr bgcolor='gray'><th>№</th><th>Мобильный</th><th>Имя</th><th>Удалить запись</th></tr>";

        while ($result = mysqli_fetch_array($query)) {
            echo"<tr>";
            echo "<td>{$i}</td>";
            echo "<td>{$result['number']}</td>";
            echo "<td>{$result['name']}</td>";
            echo "<td><a href=delite.php?id_clients={$result['id']}>Удалить</a></td>";
            echo "</tr>";
            $i++;
        }
        echo '</table>';
    }

    // удаление данных клиента
    public function DelitClient($id_clients)
    {
        require "connectDB.php";
        $query = mysqli_query($mysqli, "DELETE FROM `client` wHERE `id` = '$id_clients'");

        if ($query) {
           //данные удаленны
         } else {
             //произошла ошибка
           echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
           echo "<a href=index.php>Вернутся на главную страницу</a>";
         }
    }
    
    // поиск клиента
    public function SearchClient($value)
    {
        require "connectDB.php";
        
        if (is_numeric($value)){
            $query = mysqli_query($mysqli, "SELECT * FROM `client` WHERE `number`='$value'");
        }else{
            $query = mysqli_query($mysqli, "SELECT * FROM `client` WHERE `name`='$value'");
        }
        
        if ($query) {
            $i = 1;
            if (mysqli_num_rows($query) != 0){
                echo "<table border='1'>";
                echo "<tr bgcolor='gray'><th>№</th><th>Мобильный</th><th>Имя</th></tr>";

                while ($result = mysqli_fetch_array($query)) {
                    echo"<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$result['number']}</td>";
                    echo "<td>{$result['name']}</td>";
                    echo "</tr>";
                    $i++;
                }
                echo '</table>';

            }else{
                echo 'Поиск результатов не дал';
            }
           
          } else {
              //произошла ошибка
            echo '<p>Произошла ошибка: '.mysqli_error($mysqli).'</p>';
            echo "<a href=index.php>Вернутся на главную страницу</a>";
          }
        
    }
}

?>