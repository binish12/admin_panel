<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					

					
					$profile = getByCmnId('packages',$id);
					
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">
						

<?php
if ($act=="edit") {

	?>
	<h1>Edit Package</h1>
	<?php
} else {
	?>
	<h1>Add New Package</h1>
	<?php
}
?>




							</legend>
						<input name="cat" type="hidden" value="packages">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Package name</label>
							<input class="form-control" type="text" name="package_name" value="<?=$profile['package_name']?>" /><br>
							
							<label>Description</label>
							<input class="form-control" type="text" name="description" value="<?=$profile['description']?>" /><br>
							
							<label>Amount</label>
							<input class="form-control" type="number" name="amount" value="<?=$profile['amount']?>" /><br>
							<br>
							
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				