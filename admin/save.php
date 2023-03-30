<?php
include("includes/connect.php");

$cat = $_POST['cat'];
$cat_get = $_GET['cat'];
$act = $_POST['act'];
$act_get = $_GET['act'];
$id = $_POST['id'];
$id_get = $_GET['id'];




function saveImage($file)
{
	$file_name = $file['name'];
	$file_tmp_name = $file['tmp_name'];
	$random_name = rand(1000, 1000000) . "-" . $file_name;
	$file_upload_name = $random_name;
	$file_upload_name = preg_replace('/\s+/', '-', $file_upload_name);

	if (move_uploaded_file($file_tmp_name, '../media/' . $file_upload_name)) {
		return $file_upload_name;
	} else {
		return "";
	}
}



if ($cat == "category" || $cat_get == "category") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$icon = addslashes(htmlentities($_POST["icon"], ENT_QUOTES));
	$color = addslashes(htmlentities($_POST["color"], ENT_QUOTES));

	$result = "";
	if ($act == "add") {
		$icon = saveImage($_FILES['icon']);
		mysqli_query($link, "INSERT INTO `category` (  `name` , `icon` , `color`  ) VALUES ( '" . $name . "' , '" . $icon . "' , '" . $color . "') ");
		$result = 'Success';
	} elseif ($act == "edit") {
		if ($_FILES['icon']['name'] != "") {
			$icon = saveImage($_FILES['icon']);	
			mysqli_query($link, "UPDATE `category` SET  `name` =  '" . $name . "' , `icon` =  '" . $icon . "' , `color` =  '" . $color . "'  WHERE `id` = '" . $id . "' ");
			$result = 'Success';

		} else {
			mysqli_query($link, "UPDATE `category` SET  `name` =  '" . $name . "' , `color` =  '" . $color . "'  WHERE `id` = '" . $id . "' ");
			$result = 'Success';

		}
	} elseif ($act_get == "delete") {
		try {
			mysqli_query($link, "DELETE FROM `category` WHERE id = '" . $id_get . "' ");
		} catch (Exception $e) {
			$result = "Failure";
		}
	}
	header("location:" . "category.php?$result");
}

if ($cat == "ingredients" || $cat_get == "ingredients") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$quantity = addslashes(htmlentities($_POST["quantity"], ENT_QUOTES));
	$unit = addslashes(htmlentities($_POST["unit"], ENT_QUOTES));
	$recipe_id = addslashes(htmlentities($_POST["recipe_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `ingredients` (  `name` , `quantity` , `unit` , `recipe_id` , `created_at` , `updated_at` ) VALUES ( '" . $name . "' , '" . $quantity . "' , '" . $unit . "' , '" . $recipe_id . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `ingredients` SET  `name` =  '" . $name . "' , `quantity` =  '" . $quantity . "' , `unit` =  '" . $unit . "' , `recipe_id` =  '" . $recipe_id . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `ingredients` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "ingredients.php");
}

if ($cat == "payments" || $cat_get == "payments") {
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$transaction_id = addslashes(htmlentities($_POST["transaction_id"], ENT_QUOTES));
	$method = addslashes(htmlentities($_POST["method"], ENT_QUOTES));
	$remarks = addslashes(htmlentities($_POST["remarks"], ENT_QUOTES));
	$amount = addslashes(htmlentities($_POST["amount"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `payments` (  `user_id` , `transaction_id` , `method` , `remarks` , `amount` , `created_at` ) VALUES ( '" . $user_id . "' , '" . $transaction_id . "' , '" . $method . "' , '" . $remarks . "' , '" . $amount . "' , '" . $created_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `payments` SET  `user_id` =  '" . $user_id . "' , `transaction_id` =  '" . $transaction_id . "' , `method` =  '" . $method . "' , `remarks` =  '" . $remarks . "' , `amount` =  '" . $amount . "' , `created_at` =  '" . $created_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `payments` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "payments.php");
}


if ($cat == "members" || $cat_get == "members") {
	$full_name = addslashes(htmlentities($_POST["full_name"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$phone_number = addslashes(htmlentities($_POST["phone_number"], ENT_QUOTES));
	$is_active = addslashes(htmlentities($_POST["is_active"], ENT_QUOTES));
	

	$result = "";
	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `members` (  `full_name` , `email` , `password` , `phone_number` , `is_active`  ) VALUES ( '" . $full_name . "' , '" . $email . "' , '" . md5($password) . "', '" . $phone_number . "' , '" . $is_active . "' ) ");
		$result = "Success";
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `members` SET  `full_name` =  '" . $full_name . "' , `email` =  '" . $email . "' , `phone_number` =  '" . $phone_number . "' , `is_active` =  '" . $is_active . "'  WHERE `member_id` = '" . $id . "' ");
		$result = "Success";
	} elseif ($act_get == "delete") {
		try {
			mysqli_query($link, "DELETE FROM `members` WHERE member_id = '" . $id_get . "' ");
			$result = "Success";

		} catch (Exception $e) {
			$result = "Failure";
		}
	}
	header("location:" . "profile.php?$result");
}


if ($cat == "foods" || $cat_get == "foods") {
	$food_name = addslashes(htmlentities($_POST["food_name"], ENT_QUOTES));
	$quantities = addslashes(htmlentities($_POST["quantity"], ENT_QUOTES));
	$total_calories = addslashes(htmlentities($_POST["total_calories"], ENT_QUOTES));
	$carbohydrates = addslashes(htmlentities($_POST["carbohydrates"], ENT_QUOTES));
	$fats = addslashes(htmlentities($_POST["fats"], ENT_QUOTES));
	$protein = addslashes(htmlentities($_POST["protein"], ENT_QUOTES));
	

	$result = "";
	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `foods` (  `food_name` , `quantity` , `total_calories` , `carbohydrates` , `fats`,`protein`  ) VALUES ( '" . $food_name . "' , '" . $quantities . "' , '" . $total_calories . "', '" . $carbohydrates . "' , '" . $fats . "', '" . $protein . "' ) ");
		

		$result = "Success";
		
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `foods` SET  `food_name` =  '" . $food_name . "' , `quantity` =  '" . $quantities . "' , `total_calories` =  '" . $total_calories . "' , `carbohydrates` =  '" . $carbohydrates . "' , `fats` =  '" . $fats . "' , `protein` =  '" . $protein . "'  WHERE `food_id` = '" . $id . "' ");
		$result = "Success";
	} elseif ($act_get == "delete") {
		try {
			mysqli_query($link, "DELETE FROM `foods` WHERE food_id = '" . $id_get . "' ");
			$result = "Success";

		} catch (Exception $e) {
			$result = "Failure";
		}
	}
	header("location:" . "foods.php?$result");
}



if ($cat == "workout" || $cat_get == "workout") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$file = addslashes(htmlentities($_POST["file"], ENT_QUOTES));
	$type = addslashes(htmlentities($_POST["type"], ENT_QUOTES));


	$result = "";
	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `workout` (  `name` , `file` , `type`  ) VALUES ( '" . $name . "' , '" . $file . "' , '" . $type . "' ) ");
		

		$result = "Success";
		
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `workout` SET  `name` =  '" . $name . "' , `file` =  '" . $file . "' , `type` =  '" . $type . "' WHERE `id` = '" . $id . "'   ");
		$result = "Success";
	} elseif ($act_get == "delete") {
		try {
			mysqli_query($link, "DELETE FROM `workout` WHERE id = '" . $id_get . "' ");
			$result = "Success";

		} catch (Exception $e) {
			$result = "Failure";
		}
	}
	header("location:" . "workout.php?$result");
}



if ($cat == "packages" || $cat_get == "packages") {
	$package_name = addslashes(htmlentities($_POST["package_name"], ENT_QUOTES));
	$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));
	$amount = addslashes(htmlentities($_POST["amount"], ENT_QUOTES));


	$result = "";
	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `packages` (  `package_name` , `description` , `amount`  ) VALUES ( '" . $package_name . "' , '" . $description . "' , '" . $amount . "' ) ");
		

		$result = "Success";
		
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `packages` SET  `package_name` =  '" . $package_name . "' , `description` =  '" . $description . "' , `amount` =  '" . $amount . "' WHERE `id` = '" . $id . "'   ");
		$result = "Success";
	} elseif ($act_get == "delete") {
		try {
			mysqli_query($link, "DELETE FROM `packages` WHERE id = '" . $id_get . "' ");
			$result = "Success";

		} catch (Exception $e) {
			$result = "Failure";
		}
	}
	header("location:" . "packages.php?$result");
}




if ($cat == "purchased_plans" || $cat_get == "purchased_plans") {
	$plan_id = addslashes(htmlentities($_POST["plan_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `purchased_plans` (  `plan_id` , `user_id` , `created_at` , `updated_at` ) VALUES ( '" . $plan_id . "' , '" . $user_id . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `purchased_plans` SET  `plan_id` =  '" . $plan_id . "' , `user_id` =  '" . $user_id . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `purchased_plans` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "purchased_plans.php");
}

if ($cat == "rating" || $cat_get == "rating") {
	$recipe_id = addslashes(htmlentities($_POST["recipe_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$rating = addslashes(htmlentities($_POST["rating"], ENT_QUOTES));
	$review = addslashes(htmlentities($_POST["review"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `rating` (  `recipe_id` , `user_id` , `rating` , `review` , `created_at` , `updated_at` ) VALUES ( '" . $recipe_id . "' , '" . $user_id . "' , '" . $rating . "' , '" . $review . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `rating` SET  `recipe_id` =  '" . $recipe_id . "' , `user_id` =  '" . $user_id . "' , `rating` =  '" . $rating . "' , `review` =  '" . $review . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `rating` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "rating.php");
}

if ($cat == "recipe" || $cat_get == "recipe") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$description = addslashes(htmlentities($_POST["description"], ENT_QUOTES));
	$steps = addslashes(htmlentities($_POST["steps"], ENT_QUOTES));
	$time = addslashes(htmlentities($_POST["time"], ENT_QUOTES));
	$image = addslashes(htmlentities($_POST["image"], ENT_QUOTES));
	$video = addslashes(htmlentities($_POST["video"], ENT_QUOTES));
	$category_id = addslashes(htmlentities($_POST["category_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$is_premium = addslashes(htmlentities($_POST["is_premium"], ENT_QUOTES));
	$price = addslashes(htmlentities($_POST["price"], ENT_QUOTES));
	$calories = addslashes(htmlentities($_POST["calories"], ENT_QUOTES));
	$protein = addslashes(htmlentities($_POST["protein"], ENT_QUOTES));
	$fat = addslashes(htmlentities($_POST["fat"], ENT_QUOTES));
	$carbs = addslashes(htmlentities($_POST["carbs"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `recipe` (  `name` , `description` , `steps` , `time` , `image` , `video` , `category_id` , `user_id` , `is_premium` , `price` , `calories` , `protein` , `fat` , `carbs` , `created_at` , `updated_at` ) VALUES ( '" . $name . "' , '" . $description . "' , '" . $steps . "' , '" . $time . "' , '" . $image . "' , '" . $video . "' , '" . $category_id . "' , '" . $user_id . "' , '" . $is_premium . "' , '" . $price . "' , '" . $calories . "' , '" . $protein . "' , '" . $fat . "' , '" . $carbs . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `recipe` SET  `name` =  '" . $name . "' , `description` =  '" . $description . "' , `steps` =  '" . $steps . "' , `time` =  '" . $time . "' , `image` =  '" . $image . "' , `video` =  '" . $video . "' , `category_id` =  '" . $category_id . "' , `user_id` =  '" . $user_id . "' , `is_premium` =  '" . $is_premium . "' , `price` =  '" . $price . "' , `calories` =  '" . $calories . "' , `protein` =  '" . $protein . "' , `fat` =  '" . $fat . "' , `carbs` =  '" . $carbs . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `recipe` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "recipe.php");
}

if ($cat == "recipe_purchase" || $cat_get == "recipe_purchase") {
	$recipe_id = addslashes(htmlentities($_POST["recipe_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$payment_id = addslashes(htmlentities($_POST["payment_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `recipe_purchase` (  `recipe_id` , `user_id` , `payment_id` , `created_at` , `updated_at` ) VALUES ( '" . $recipe_id . "' , '" . $user_id . "' , '" . $payment_id . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `recipe_purchase` SET  `recipe_id` =  '" . $recipe_id . "' , `user_id` =  '" . $user_id . "' , `payment_id` =  '" . $payment_id . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `recipe_purchase` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "recipe_purchase.php");
}

if ($cat == "saved_recipe" || $cat_get == "saved_recipe") {
	$recipe_id = addslashes(htmlentities($_POST["recipe_id"], ENT_QUOTES));
	$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `saved_recipe` (  `recipe_id` , `user_id` , `created_at` ) VALUES ( '" . $recipe_id . "' , '" . $user_id . "' , '" . $created_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `saved_recipe` SET  `recipe_id` =  '" . $recipe_id . "' , `user_id` =  '" . $user_id . "' , `created_at` =  '" . $created_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `saved_recipe` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "saved_recipe.php");
}

if ($cat == "tokens" || $cat_get == "tokens") {
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$token = addslashes(htmlentities($_POST["token"], ENT_QUOTES));
	$created_at = addslashes(htmlentities($_POST["created_at"], ENT_QUOTES));
	$updated_at = addslashes(htmlentities($_POST["updated_at"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `tokens` (  `email` , `token` , `created_at` , `updated_at` ) VALUES ( '" . $email . "' , '" . $token . "' , '" . $created_at . "' , '" . $updated_at . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `tokens` SET  `email` =  '" . $email . "' , `token` =  '" . $token . "' , `created_at` =  '" . $created_at . "' , `updated_at` =  '" . $updated_at . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `tokens` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "tokens.php");
}

if ($cat == "users" || $cat_get == "users") {
	$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
	$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
	$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
	$role = addslashes(htmlentities($_POST["role"], ENT_QUOTES));


	if ($act == "add") {
		mysqli_query($link, "INSERT INTO `users` (  `name` , `email` , `password` , `role` ) VALUES ( '" . $name . "' , '" . $email . "' , '" . md5($password) . "', '" . $role . "' ) ");
	} elseif ($act == "edit") {
		mysqli_query($link, "UPDATE `users` SET  `name` =  '" . $name . "' , `email` =  '" . $email . "' , `role` =  '" . $role . "'  WHERE `id` = '" . $id . "' ");
	} elseif ($act_get == "delete") {
		mysqli_query($link, "DELETE FROM `users` WHERE id = '" . $id_get . "' ");
	}
	header("location:" . "users.php");
}
?>