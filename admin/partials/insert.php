
<?php
// Include the database configuration file  
require_once 'db_connect.php';

// If file upload form is submitted 
$url = 'http://localhost/betafour-static/admin/';
$status = false;
$statusMsg = false;

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        // $title = $_FILES['title']['name'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];

            $imgContent = addslashes(file_get_contents($image));
            $destinationfile = 'upload/' . $fileName;
            move_uploaded_file($image, $destinationfile);
            // Insert image content into database 
            $insert = $conn->query("INSERT INTO `home-slider`( `image_url`,`slider_title`) VALUES ('$destinationfile','$title')");

            if ($insert) {
                $status = true;
                header("location:home-slider.php");
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
// Display status message 
echo $statusMsg;
?>

<?php

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM `categories` WHERE cat_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo $status = true;
        header("Location: ../categories.php");
    }
    else
    {
        echo $statusMsg="try again";
    }
}

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $delete = "DELETE FROM `home-slider` WHERE Id='$id'";
    $query_run = mysqli_query($conn, $delete);

    if($query_run)
    {
        echo $status = true;
        header("Location: ../home-slider.php");
    }
    else
    {
        echo $statusMsg="try again";
    }
}

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $del = "DELETE FROM `products` WHERE product_id='$id'";
    $query_run = mysqli_query($conn, $del);

    if($query_run)
    {
        echo $status = true;
        header("Location: ../products.php");
    }
    else
    {
        echo $statusMsg="try again";
    }
}

?>

