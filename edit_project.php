<?php
include_once('connect.php');

	// Редактирование записей
if ((isset($_POST['edit_project']) && $_POST['edit_project'])) 
	{
    	$id = $_POST['id'];
	    $edit_project = strip_tags(trim($_POST['edit_project']));
    	$sql = "UPDATE `projects` SET `name`='$edit_project' WHERE id='$id'";
    	mysqli_query($connection, $sql);
    	unset($_POST);

} elseif (isset($_POST['edit_project'])) {
    	echo 'Поле должно быть заполнено';
}


// Вывод записи по id для редактирования
$id = $_POST['id'];
$sql = "SELECT `name` FROM `projects` WHERE `id` = '$id'";
$result = mysqli_query($connection, $sql);
?>

<?php foreach ($result as $var) { ?>
<div id="myProject_edit">

<form id="form_create_project" method="post" >
	<div class="form-group">
	  <input type="hidden" name="id" value="<?= $id?>">
      <input type="text" class="form-control" name="edit_project" value="<?= $var['name'] ?>">
      <input type="submit" id="save_project" name="project_edit" class="btn btn-success" value="Save" >
	</div>
</form>
<?php } ?>
</div>
