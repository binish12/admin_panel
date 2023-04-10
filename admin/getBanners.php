<?php
include("includes/connect.php");

//get categories from the database


 $file = "SELECT image from banners";
    $result = mysqli_query($link, $file);
    if ($result) {
        $data = [];
      
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row['image'];
         
        }
        echo json_encode(
            [
                'success' => true,
                'data' => $data,
                'message' => "Banners fetched successfully"
            ]
        );
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Error fetching Banners'
            ]
        );
    }
?>