<?php
include("includes/connect.php");

//get categories from the database


 $query = "SELECT title,description from notices WHERE expiry_date is NULL OR expiry_date > NOW()";
    $result = mysqli_query($link, $query);
    if ($result) {
        $data = [];
      
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
         
        }
        echo json_encode(
            [
                'success' => true,
                'data' => $data,
                'message' => "Notices fetched successfully"
            ]
        );
    } else {
        echo json_encode(
            [
                'success' => false,
                'message' => 'Error fetching Notices'
            ]
        );
    }
?>