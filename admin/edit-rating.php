<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$rating = getById("rating", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Rating</legend>
						<input name="cat" type="hidden" value="rating">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Recipe id</label>
							<input class="form-control" type="text" name="recipe_id" value="<?=$rating['recipe_id']?>" /><br>
							
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$rating['user_id']?>" /><br>
							
							<label>Rating</label>
							<input class="form-control" type="text" name="rating" value="<?=$rating['rating']?>" /><br>
							
							<label>Review</label>
							<input class="form-control" type="text" name="review" value="<?=$rating['review']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$rating['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$rating['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				