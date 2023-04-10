<?php
include("includes/connect.php");

 $query = "SELECT food_name,quantity,total_calories,carbohydrates,fats,protein from foods ";
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
                'message' => "Foods fetched successfully"
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