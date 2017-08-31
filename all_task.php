 	<!-- подключение к базе данных и запрос для возвращение массива данных -->
 	<?php
	include_once('connect.php');
	$sql = "SELECT * FROM `task_list`";
	$sql2 = "SELECT * FROM `projects`";
	$res = mysqli_query($connection, $sql);
	$projects = mysqli_query($connection, $sql2);