<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$recipe_purchase = getById("recipe_purchase", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Recipe_purchase</legend>
						<input name="cat" type="hidden" value="recipe_purchase">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Recipe id</label>
							<input class="form-control" type="text" name="recipe_id" value="<?=$recipe_purchase['recipe_id']?>" /><br>
							
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$recipe_purchase['user_id']?>" /><br>
							
							<label>Payment id</label>
							<input class="form-control" type="text" name="payment_id" value="<?=$recipe_purchase['payment_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$recipe_purchase['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$recipe_purchase['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				