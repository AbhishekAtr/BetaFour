<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    if (($password == $cpassword) && $exists == false) {
        $sql = "INSERT INTO `admin`(`Username`, `Password`) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    } else {
        $showError = "Password do not match";
    }
}

?>


<?php include 'partials/header.php'; ?>

<?php
if ($showAlert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Your account is now created successfully and now you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}

if ($showError) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
?>

<div class="container">
    <h1 class="text-center mt-5">Sign Up</h1>
    <div class="row my-5">
        <div class="col-md-6">
            <div class="">
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-white">Email address</label>
                        <input type="email" name="username" id="username" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-primary">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-white">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-white">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="confirm Password">
                        <small id="emailHelp" class="form-text text-primary">Make sure to type the same password.</small>

                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'partials/footer.php'; ?>