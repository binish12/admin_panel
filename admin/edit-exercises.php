<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];		
					$profile = getByExerId('exercises',$id);
					
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">
						

						<?php
						if ($act=="edit") {

							?>
							<h1>Edit Exersise</h1>
							<?php
						} else {
							?>
							<h1>Add New Exercise</h1>
							<?php
						}
							?>
							</legend>
						<input name="cat" type="hidden" value="exercises">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Exercise Name</label>
							<input class="form-control" type="text" name="exercise_name" value="<?=$profile['exercise_name']?>" /><br>

							<label>Sets</label>
							<input class="form-control" type="text" name="sets" value="<?=$profile['sets']?>" /><br>
							
							<label>Reps</label>
							<input class="form-control" type="text" name="reps" value="<?=$profile['reps']?>" /><br>
							
							
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				