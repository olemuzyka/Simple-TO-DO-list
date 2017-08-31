<?php
include_once('connect.php');


	// Редактирование записей
if ((isset($_POST['edit_task']) && $_POST['edit_task'])) 
	{
    	$id = $_POST['id'];
	    $edit_task = strip_tags(trim($_POST['edit_task']));
    	$sql = "UPDATE `task_list` SET `task`='$edit_task' WHERE id='$id'";
    	mysqli_query($connection, $sql);
    	unset($_POST);
} elseif (isset($_POST['edit_task'])) {
    	echo 'Поле должно быть заполнено';
}

	// Изминение статуса checkbox
if ((isset($_POST['sttatus'], $_POST['id']))) 
{
    	$id = $_POST['id'];
    	$check = (int)$_POST['sttatus'];
	    $sql = "UPDATE `task_list` SET `status`='$check' WHERE id='$id'";
	    mysqli_query($connection, $sql);
    	unset($_POST);
}


// Вывод записи по id для редактирования
$id = $_POST['id'];
$sql = "SELECT `task` FROM `task_list` WHERE `id` = '$id'";
$result = mysqli_query($connection, $sql);
?>

<?php foreach ($result as $var) { ?>
<div id="myModal_edit">

<form id="form_create" method="post">
	<div class="form-group">
	  <input type="hidden" name="id" value="<?= $id?>">
      <input type="text" class="form-control" name="edit_task" value="<?= $var['task'] ?>">
      <input type="submit" id="save_edit" name="edit" class="btn btn-success" value="Save" >
	</div>
</form>
<?php } ?>
</div>


