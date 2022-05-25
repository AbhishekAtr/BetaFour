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
    } else {
        $showError = "Incorrect Credentials";
    }
}
session_abort();
?>



<?php include 'include/css-url.php'; ?>

<?php
if ($login) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Login Successfully.
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
<body style="background-color: #f2edf3;">
<!-- <div class="container mt-5">  
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
</div> -->
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex justify-content-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo mb-2 text-center">
                  <img src="../images/logo/final-logo-footer.png" class="bg-logo p-2">
                </div>
                <h4 style="font-family: cursive;" class="text-center">Hello! let's get started</h4>
                <h6 class="font-weight-regular text-center" style="font-family: System-UI;">Log in to continue.</h6>
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-white">Email address</label>
                        <input type="email" name="username" id="username" class="form-control form-control-lg"placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-white">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-login text-white col-md-12">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
</body>
<?php include 'include/js-url.php'; ?>