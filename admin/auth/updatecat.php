<?php
// Include the database configuration file  
include 'include/db_connect.php';

// If file upload form is submitted 
$status = false;
$statusMsg = false;

if (isset($_POST['update'])) {
    $id = $_POST['edit_id'];

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $status = 'error';
    if (!empty($_FILES["e_image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["e_image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['e_image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            if (move_uploaded_file($image, $destinationfile)) {
                // Update image content into database
                $query = "UPDATE `categories` SET  `cat_img`='$destinationfile', `cat_title`= '$title', `cat_desc` = '$desc' WHERE cat_id='$id'";
                $smt = $conn->prepare($query);
                $smt->execute();
                if ($query) {
                    $status = true;
                    header('location: categories.php');
                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        } else {
            $statusMsg = 'Please select an image file to upload.';
        }
    }
}
?>
