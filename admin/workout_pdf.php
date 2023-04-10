<?php

include("includes/connect.php");

if(isset($_POST['act'])){

    $act = $_POST['act'];

    if($act == "add"){
        $workout_name = $_POST['workout_name'];
        $type = $_POST['type'];

        // PDF upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $pdf_name = basename($_FILES["file"]["name"]);
        $pdf_path = $target_file;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }
        else{
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
            }
            else {
                echo "Sorry, there was an error uploading your file.";
            }

            // Insert data into workout table
            $sql = "INSERT INTO workout (name, file, type, created_at) VALUES ('$pdf_name', '$pdf_path', '$type', NOW())";
            $result = mysqli_query($link, $sql);

            if($result){
                header('Location: workout.php?Success');
            }
            else{
                header('Location: workout.php?Failure');
            }
        }
    }

    elseif($act == "edit"){
        $id = $_POST['id'];
        $workout_name = $_POST['workout_name'];
        $type = $_POST['type'];
        $pdf_name = '';
        $pdf_path = '';

        // PDF update
        if ($_FILES["file"]["name"] != '') {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $pdf_name = basename($_FILES["file"]["name"]);
            $pdf_path = $target_file;

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            }
            else{
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
                }
                else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        // Update data in workout table
        $sql = "UPDATE workout SET name='$pdf_name', file='$pdf_path', type='$type', updated_at=NOW() WHERE id='$id'";
        $result = mysqli_query($link, $sql);

        if($result){
            header('Location: workout.php?Success');
        }
        else{
            header('Location: workout.php?Failure');
        }
    }
}
?>
