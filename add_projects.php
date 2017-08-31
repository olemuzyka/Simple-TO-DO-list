
<?php
include('connect.php');
	//Добавление нового проекта
if (isset($_POST['add_project'])){
	if ((isset($_POST['new_project']) && $_POST['new_project'])){
		$project = strip_tags(trim($_POST['new_project']));
		$id = strip_tags(trim($_POST['id']));
		$sql = "INSERT INTO `projects` (`name`) VALUES ('$project')";
		mysqli_query($connection, $sql);
		unset($_POST);
	}
}

?>
<form method="POST" class="form_add">
	<div class="form-group">
		<input type="hidden" name="id" value="<?= $p['id']?>">
		<input type="text" class="form-control" name="new_project" placeholder="Add a new project...">
		<input type="submit" name="add_project" class="btn btn-success" id="create_project" value="Add project">
	</div>
</form>

