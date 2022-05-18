<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `admin` WHERE Username='$username' And Password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
       $login = true;
       session_start();
       $_SESSION['loggedin'] = true;
       $_SESSION['username'] = $username;
       header("location: home-slider.php");
    }

    else{
        $showError= "Incorrect Credentials";
    }
}
?>



<?php include 'include/css-url.php'; ?>

    <?php
    if($login) {
        
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Login Successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }

    if($showError) {
        
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> '. $showError .'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    ?>


<div class="container">
    <h1 class="text-center mt-5">Login</h1>
    <div class="row my-5 align-center">
        <div class="col-md-6">
            <div class="p-5">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-white">Email address</label>
                        <input type="email" name="username" id="username" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-white">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'include/js-url.php'; ?>