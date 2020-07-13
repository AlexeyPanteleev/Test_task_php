<?php
/**
 * Класс для работы с базой данных имеет 4 метода, которые 
 * осуществляют добавление данных в БД, вывод и отображение 
 * хранящихся данных, а также поиск и удаление необходимой
 * информации.
 */
class Position{
    
    /**
     * Функция добавляющая телефонный номер 
     * и имя клиента в БД через команды SQL
     */
    public function AddClient($number, $name)
    {
        require "connectDB.php"; // скрипт с подключением к БД

        $query = "INSERT INTO `client` (number, name) VALUES ('$number', '$name')";
        $result = mysqli_query($mysqli, $query);

        // проверка на коректное выполнение запроса
        if ($query){
            // данные добавлены
        }else {
            //произошла ошибка
          echo '<p>Произошла ошибка: '.mysqli_error($mysqli).'</p>';
        }
        
    }

    /**
     * Функция выводящая и отображающая хранимые данные в 
     * виде списка, посредством SQL запроса в БД
     */
    public function ViewClient()
    {
        require "connectDB.php";
        $query = mysqli_query($mysqli, 'SELECT `id`, `number`, `name` FROM `client`');
        $i=1; // переменная-счетчик для отображения порадкового номера
        echo "<table border='1'>";
        echo "<tr bgcolor='gray'><th>№</th><th>Мобильный</th><th>Имя</th><th>Удалить запись</th></tr>";
        
        // Вывод и отображение данных в виде списка с помощбю HTML тегов
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

    /**
     * Функция удаленния данных из БД через id записи
     * с помощью SQL запроса.
     */
    public function DelitClient($id_clients)
    {
        require "connectDB.php";
        $query = mysqli_query($mysqli, "DELETE FROM `client` wHERE `id` = '$id_clients'");

        // проверка на коректное выполнение запроса
        if ($query) {
           //данные удаленны
         } else {
             //произошла ошибка
           echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
           echo "<a href=index.php>Вернутся на главную страницу</a>";
         }
    }
    
    /**
     * Функция поиска информации в БД по номеру телефона 
     * или имени клиента. В зависимости от введенной информации 
     * переменная $value будет иметь значение имени или номера.
     */
    public function SearchClient($value)
    {
        require "connectDB.php";
        
        // проверка на хранимое значение переменной $value
        if (is_numeric($value)){
            $query = mysqli_query($mysqli, "SELECT * FROM `client` WHERE `number`='$value'");
        }else{
            $query = mysqli_query($mysqli, "SELECT * FROM `client` WHERE `name`='$value'");
        }

        // проверка на коректное выполнение запроса
        if ($query) {
            $i = 1;

            /**
             * Если запрос вернет нулевое количество строк то поиск результатов не дал,
             * иначе данные будут выведены и оформленны чс помощью HTM тегов
             */
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
                echo 'Поиск результатов не дал. Проверьте введенные данные.';
            }
          } else {
              //произошла ошибка
            echo '<p>Произошла ошибка: '.mysqli_error($mysqli).'</p>';
            echo "<a href=index.php>Вернутся на главную страницу</a>";
          }
    }
}

?>