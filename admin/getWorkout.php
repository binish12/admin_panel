<?php
include("includes/connect.php");

//get categories from the database
$fileID = $_GET['id'];

 $file = "SELECT * from workout WHERE id = $fileID";
    $result = mysqli_query($link, $file);
    if ($result) {
        $data = [];
      
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row['file'];
         
        }
        echo json_encode(
            [
                'success' => true,
                'data' => $data,
                'message' => "Products fetched successfully"
            ]
        );
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Error fetching categories'
            ]
        );
    }
?>