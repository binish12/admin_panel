<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];		
					$profile = getByFoodId("foods", $id);
					
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">
						

						<?php
						if ($act=="edit") {

							?>
							<h1>Edit Food</h1>
							<?php
						} else {
							?>
							<h1>Add New Food</h1>
							<?php
						}
							?>
							</legend>
						<input name="cat" type="hidden" value="foods">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Food Name</label>
							<input class="form-control" type="text" name="food_name" value="<?=$profile['food_name']?>" /><br>

							<label>Quantity</label>
							<input class="form-control" type="text" name="quantity" value="<?=$profile['quantity']?>" /><br>
							
							<label>Total Calories</label>
							<input class="form-control" type="text" name="total_calories" value="<?=$profile['total_calories']?>" /><br>
							
							<label>Carbohydrates</label>
							<input class="form-control" type="text" name="carbohydrates" value="<?=$profile['carbohydrates']?>" /><br>
							
							<label>Fats</label>
							<input class="form-control" type="text" name="fats" value="<?=$profile['fats']?>" /><br>
							
							<label>Protein</label>
							<input class="form-control" type="text" name="protein" value="<?=$profile['protein']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				