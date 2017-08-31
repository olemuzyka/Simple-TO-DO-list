<?php
include('connect.php');
// Удаление данных 
	$id = $_POST['id'];
	
		$sql = "DELETE FROM `projects` WHERE `id` = '$id'";
		$result = mysqli_query($connection, $sql);
			unset($_POST);
  
