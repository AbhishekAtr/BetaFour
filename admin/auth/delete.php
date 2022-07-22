
<?php
include 'include/db_connect.php';
$id = $_POST['delete_id'];
$delete = "DELETE FROM `products` WHERE product_id='$id'";
$query = mysqli_query($conn, $delete);
?>

<?php

include 'include/db_connect.php';
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "select * from products where product_id = '$id'";
    $result = mysqli_query($conn, $sql);
    while($row= mysqli_fetch_assoc($result)){
        $id = $row['product_id'];
    }
}
?>



<input type="hidden" name="delete_id" id="delete_id" value="<?php echo $id; ?>" />
<p>Do you want to delete this record? Not undo!</p>




