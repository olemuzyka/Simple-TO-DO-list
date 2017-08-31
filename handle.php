
<?php
include('connect.php');
	//Добавление данных
if (isset($_POST['add'])){
	if ((isset($_POST['new_task']) && $_POST['new_task'])){
		$task = strip_tags(trim($_POST['new_task']));
		$id = strip_tags(trim($_POST['id']));
		$sql = "INSERT INTO `task_list` (`task`, `status`, `project_id`) VALUES ('$task', '0', '$id')";
		mysqli_query($connection, $sql);
		unset($_POST);
	}
}

?>
<form method="POST" class="form_add">
	<div class="form-group">
		<input type="hidden" name="id" value="<?= $p['id']?>">
		<input type="text" class="form-control" name="new_task" placeholder="Add a new item...">
		<input type="submit" name="add" class="btn btn-success" id="create_task" value="Add task">
	</div>
</form>