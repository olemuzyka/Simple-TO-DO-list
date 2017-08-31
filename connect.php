<!-- подключение к баззе -->
<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'todolist_db' );

/* проверка соединения */
if ($connection == false) {
    echo mysqli_connect_error();
    exit;
}









