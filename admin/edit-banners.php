<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];		
					$profile = getByCmnId("banners", $id);
					
				}
				?>

				<form method="post" action="upload_banners.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">
						

						<?php
						if ($act=="edit") {

							?>
							<h1>Edit Banner</h1>
							<?php
						} else {
							?>
							<h1>Add New Banner</h1>
							<?php
						}
							?>
							</legend>
						<input name="cat" type="hidden" value="banners">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							

							<label>Image</label>
							<input class="form-control" type="file" name="image" value="<?=$profile['image']?>" /><br>
							
							
							<br>
					<input type="submit" value=" Save " class="btn btn-success">

					</form>
					
					

<?php include "includes/footer.php";?>
				