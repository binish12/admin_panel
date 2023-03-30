<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];		
					$profile = getByCmnId("workout", $id);
					
				}
				?>

				<form method="post" action="workout_pdf.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">
						

						<?php
						if ($act=="edit") {

							?>
							<h1>Edit Workout</h1>
							<?php
						} else {
							?>
							<h1>Add New Workout</h1>
							<?php
						}
							?>
							</legend>
						<input name="cat" type="hidden" value="workout">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Workout Name</label>
							<input class="form-control" type="text" name="workout_name" value="<?=$profile['name']?>" /><br>

							<label>File</label>
							<input class="form-control" type="file" name="file" value="<?=$profile['file']?>" /><br>
							
							<label>Type</label>
							<input class="form-control" type="text" name="type" value="<?=$profile['type']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">

					</form>
					
					

<?php include "includes/footer.php";?>
				