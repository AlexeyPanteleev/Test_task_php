<?php

class Position{
    //public $result;
    public function AddClient($number, $name)
    {
        require "connectDB.php";
        $query = "INSERT INTO `client` (number, name) VALUES ('$number', '$name')";
        $result = mysqli_query($mysqli, $query);
        
    }
    public function ViewClient()
    {
        require "connectDB.php";
        $query = mysqli_query($mysqli, 'SELECT `id`, `number`, `name` FROM `client`');
        $i=1;
        echo "<table border='1'>";
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

    public function SearchClient($name)
    {
        require "connectDB.php";
        $query = mysqli_query($mysqli, "SELECT * FROM `client` WHERE `name`='$name'");
        if ($query) {
            echo '<div class="container" style="border:1px solid #cecece;">';
            
            if (mysqli_num_rows($query) != 0){
                echo "<table border='1'>";
                while ($result = mysqli_fetch_array($query)) {
                    echo"<tr>";
                    echo "<td>{$result['number']}</td>";
                    echo "<td>{$result['name']}</td>";
                    echo "</tr>";
                }
                echo '</table>';

            }else{
                echo 'Поиск результатов не дал';
            }
            echo '</div>';
          } else {
              //произошла ошибка
            echo '<p>Произошла ошибка: '.mysqli_error($mysqli).'</p>';
            echo "<a href=index.php>Вернутся на главную страницу</a>";
          }
        
    }
}

?>