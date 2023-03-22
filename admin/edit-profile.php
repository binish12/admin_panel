<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					

					
					$profile = getById("members", $id);
					
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">
						

<?php
if ($act=="edit") {

	?>
	<h1>Edit Profile</h1>
	<?php
} else {
	?>
	<h1>Add New Profile</h1>
	<?php
}
?>




							</legend>
						<input name="cat" type="hidden" value="members">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Full name</label>
							<input class="form-control" type="text" name="full_name" value="<?=$profile['full_name']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$profile['email']?>" /><br>
							
							<label>Password</label>
							<input class="form-control" type="text" name="password" value="<?=$profile['password']?>" /><br>
							
							<label>Phone number</label>
							<input class="form-control" type="text" name="phone_number" value="<?=$profile['phone_number']?>" /><br>
							
							<label>Is active</label>
							<input class="form-control" type="text" name="is_active" value="<?=$profile['is_active']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$profile['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$profile['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				