<?php
// подключение запроса для ввыода
include_once('all_task.php');
include('edit_project.php');
?>
<html>
<head>
	<title>Simple To-Do List</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="wrapper">

	<!-- Форма редактирования задач -->

	<div class="edit-form" id="form_edit"></div> 

	<!-- Форма редактирования проектов -->
	<div class="edit-form" id="form_edit_project"></div> 

	<!-- Вывод проектов и задач -->
		<?php foreach ($projects as $p) : ?>
			<div class="container">
				<div class="project_name">
					<h2><?= $p['name'] ?></h2>
					<div id="button_project">
						<button type="button" class="btn btn-link btn-md editProject" name="update" value="<?= $p['id'] ?>">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
						<button type="button" formmethod="post" class="btn btn-link btn-md deleteProject" name="delete"  value="<?= $p['id'] ?>">
							<span class="glyphicon glyphicon-trash"></span>  
						</button>    
					</div>    	
				</div>

				<?php
				include('handle.php');
				include('edit.php');
				?>
				<ul class="list-group">
					<?php foreach ($res as $var) :
					if ($p['id'] === $var['project_id']) : ?>
					<form class = "form_task">
						<li class="list-group-item" id="item">
							<input type="checkbox" class="check" value="<?= $var['id'] ?>" name="stat" <?= $var['status'] ? 'checked' : '' ?>>
							<h4><?= $var['task'] ?></h4>
							<div id="button">
								<button type="button" class="btn btn-link btn-md editTask" data-toggle="modal" data-target="#myModal" name="update" value="<?= $var['id'] ?>">
									<span class="glyphicon glyphicon-pencil"></span>
								</button>
								<button type="button" formmethod="post" class="btn btn-link btn-md deleteTask" name="delete"  value="<?= $var['id'] ?>">
									<span class="glyphicon glyphicon-trash"></span>  
								</button>    
							</div>   			
						</li>
					<?php endif;?>
				</form>
			<?php endforeach;?>
		</ul>
	</div>
<?php endforeach; ?>





<?php
include('add_projects.php');
?>
</div>
</body>
</html>


<script>
 // Создать запись задачи
 $(document).ready(
 	$('#create_task').on('click', function () {
 		$.ajax({
 			type: "POST",
 			url: "/handle.php",
 			data: {data: $(this).serialize()}
 		}).done(function (msg) {
 			location.reload();
 		});
 	})
 	);
// Создать запись проекта
$(document).ready(
	$('#create_project').on('click', function () {
		$.ajax({
			type: "POST",
			url: "/add_projects.php",
			data: {data: $(this).serialize()}
		}).done(function (msg) {
			location.reload();
		});
	})
	);

	 // Достать данные по ID для изменения задачи
	 $(document).ready(
	 	$('.editTask').on('click', function () {

	 		$.ajax({
	 			type: "POST",
	 			url: "/edit.php",
	 			data: {id: $(this).val()}
	 		}).done(function (msg) {
	 			$('#form_edit').html(msg);
	 			$("#myModal_edit");
	 		});
	 	})
	 	);

    //  Редактировать задачу по ID 
    $(document).ready(
    	$('#save_edit').on('click', 'form_create', function () {

    		$.ajax({
    			type: "POST",
    			url: "/edit.php",
    			data: {
    				data: $('#form_create').serialize()}
    			}).done(function (e) {
    				location.reload();
    			})
    		})
    	);


 // Достать данные по ID для изменения проекта
 $(document).ready(
 	$('.editProject').on('click', function () {

 		$.ajax({
 			type: "POST",
 			url: "/edit_project.php",
 			data: {id: $(this).val()}
 		}).done(function (msg) {
 			$('#form_edit_project').html(msg);
 			$("#myProject_edit");
 		});
 	})
 	);

    //  Редактировать проект по ID 
    $(document).ready(
    	$('#save_project').on('click', 'form_create_project', function () {

    		$.ajax({
    			type: "POST",
    			url: "/edit_project.php",
    			data: {
    				data: $('#form_create_project').serialize()}
    			}).done(function (e) {
    				alert('ok');
    				location.reload();
    			})
    		})
    	);


    //  Измениить статус по ID
    $(document).ready(
    	$('.check').on('click', function () {

    		$.ajax({
    			type: "POST",
    			url: "/edit.php",
    			data: {
    				id: $(this).val(),
    				sttatus: ($(this).attr("checked") != 'checked') ? 1 : 0
    			}
    		}).done(function (e) {
    		})
    	})
    	);
	// Достать данные по ID для удаления задачи
	$(document).ready(
		$('.deleteTask').on('click', function () {

			$.ajax({
				type: "POST",
				url: "/delete.php",
				data: {id: $(this).val()}
			}).done(function () {
				location.reload();

			});
		})
		);


	// Достать данные по ID для удаления проекта
	$(document).ready(
		$('.deleteProject').on('click', function () {

			$.ajax({
				type: "POST",
				url: "/delete_project.php",
				data: {id: $(this).val()}
			}).done(function () {
				location.reload();

			});
		})
		);
	</script>