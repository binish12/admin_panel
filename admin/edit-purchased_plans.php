<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$purchased_plans = getById("purchased_plans", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Purchased_plans</legend>
						<input name="cat" type="hidden" value="purchased_plans">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Plan id</label>
							<input class="form-control" type="text" name="plan_id" value="<?=$purchased_plans['plan_id']?>" /><br>
							
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$purchased_plans['user_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$purchased_plans['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$purchased_plans['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				