<?php
include("includes/connect.php");

if(isset($_POST['act'])){

    $act = $_POST['act'];

    if($act == "add"){
        

        // Image upload
        $image_target_dir = "uploads/banners/";
        $image_target_file = $image_target_dir . basename($_FILES["image"]["name"]);
        $image_name = basename($_FILES["image"]["name"]);
        $image_path = $image_target_file;

        // Check if file already exists
        if (file_exists($image_target_file)) {
            echo "Sorry, file already exists.";
        }
        else{
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_target_file)) {
                echo "The file has been uploaded.";

                // Insert data into banners table
                $sql = "INSERT INTO banners (image) VALUES ('$image_path')";
                $result = mysqli_query($link, $sql);

                if($result){
                    header('Location: banners.php?Success');
                }
                else{
                    header('Location: banners.php?Failure');
                }
            }
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    elseif($act == "edit"){
        $id = $_POST['id'];
        
        $image_name = '';
        $image_path = '';

        // Get old image data
        $sql = "SELECT image FROM banners WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $image_path = $row['image'];
        }

        // Image update
        if ($_FILES["image"]["name"] != '') {
            $image_target_dir = "uploads/banners/";
            $image_target_file = $image_target_dir . basename($_FILES["image"]["name"]);
            $image_name = basename($_FILES["image"]["name"]);
            $image_path = $image_target_file;

            // Check if file already exists
            if (file_exists($image_target_file)) {
                echo "Sorry, image already exists.";
            }
            else{
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_target_file)) {
                    echo "The Image ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                }
                else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        }


        $sql = "UPDATE banners SET image='$image_path' WHERE id='$id'"; // added space between $image_path and WHERE
        $result = mysqli_query($link, $sql);

        if($result){
            header('Location: banners.php?Success');
        }
        else{
            header('Location: banners.php?Failure');
        }
    }
    
}
?>
