<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$recipe = getById("recipe", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Recipe</legend>
						<input name="cat" type="hidden" value="recipe">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Name</label>
							<input class="form-control" type="text" name="name" value="<?=$recipe['name']?>" /><br>
							
							<label>Description</label>
							<textarea class="ckeditor form-control" name="description"><?=$recipe['description']?></textarea><br>
							
							<label>Steps</label>
							<textarea class="ckeditor form-control" name="steps"><?=$recipe['steps']?></textarea><br>
							
							<label>Time</label>
							<input class="form-control" type="text" name="time" value="<?=$recipe['time']?>" /><br>
							
							<label>Image</label>
							<input class="form-control" type="text" name="image" value="<?=$recipe['image']?>" /><br>
							
							<label>Video</label>
							<input class="form-control" type="text" name="video" value="<?=$recipe['video']?>" /><br>
							
							<label>Category id</label>
							<input class="form-control" type="text" name="category_id" value="<?=$recipe['category_id']?>" /><br>
							
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$recipe['user_id']?>" /><br>
							
							<label>Is premium</label>
							<input class="form-control" type="text" name="is_premium" value="<?=$recipe['is_premium']?>" /><br>
							
							<label>Price</label>
							<input class="form-control" type="text" name="price" value="<?=$recipe['price']?>" /><br>
							
							<label>Calories</label>
							<input class="form-control" type="text" name="calories" value="<?=$recipe['calories']?>" /><br>
							
							<label>Protein</label>
							<input class="form-control" type="text" name="protein" value="<?=$recipe['protein']?>" /><br>
							
							<label>Fat</label>
							<input class="form-control" type="text" name="fat" value="<?=$recipe['fat']?>" /><br>
							
							<label>Carbs</label>
							<input class="form-control" type="text" name="carbs" value="<?=$recipe['carbs']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$recipe['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$recipe['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				