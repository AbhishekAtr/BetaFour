

<?php

use function PHPSTORM_META\type;

$status = false;
$statusMsg = false;
include '../include/db_connect.php';
//fetch.php  
if (isset($_POST["edit_btn"])) {
    $id = $_POST['edit_id'];
    $data= [];
    $query = "SELECT * from `home-slider` where Id = '$id'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        foreach($result as $row){
            array_push($data, $row); 
            header('Content-type: application/json');
            echo json_encode($data);  
        }
    }

    
}
?>

