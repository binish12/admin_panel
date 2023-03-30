<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];		
					$profile = getByCmnId("notices",$id);
					
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">
						

						<?php
						if ($act=="edit") {

							?>
							<h1>Edit Notice</h1>
							<?php
						} else {
							?>
							<h1>Add New Notice</h1>
							<?php
						}
							?>
							</legend>
						<input name="cat" type="hidden" value="notices">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Title</label>
							<input class="form-control" type="text" name="title" value="<?=$profile['title']?>" /><br>

							<label>Description</label>
							<input class="form-control" type="text" name="description" value="<?=$profile['description']?>" /><br>
							
							<label>Expiry Date</label>
							<input class="form-control" type="datetime-local" name="expiry_date" value="<?=$profile['expiry_date']?>" /><br>
							<br>

					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				