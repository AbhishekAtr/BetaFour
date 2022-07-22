<?php
// $login = false;
// $showError = false;
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     include 'include/db_connect.php';
//     $Username = $_POST["username"];
//     $Password = $_POST["password"];

//     $sql = "SELECT * FROM `admin` WHERE Username='$Username' And Password='$Password'";
//     $result = mysqli_query($conn, $sql);
//     $num = mysqli_num_rows($result);
//     if ($num == 1) {
//         $login = true;
//         session_start();
//         $_SESSION['loggedin'] = true;
//         $_SESSION['username'] = $Username;
//         header("location: home-slider.php");
//     } else {
//         $showError = "Incorrect email or password";
//     }
// }
?>

<?php
include 'include/db_connect.php';

$uname = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);

if ($uname != "" && $password != ""){

    $sql_query = "SELECT * FROM `admin` WHERE Username='".$uname."' and Password='".$password."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);
    if( $num == 1){
        $_SESSION['uname'] = $uname;
        
    }else{
        
    }

}

?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(to right, #b92b27, #1565c0)
        }


        .card {
            margin-bottom: 20px;
            border: none;
        }

        .box {
            width: 500px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            background: white;
            border-radius: 30px;
            text-align: center;
            transition: 0.25s;
            margin-top: 100px
        }

        .box input[type="text"],
        .box input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 250px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s
        }

        .box h1 {
            color: black;
            text-transform: uppercase;
            font-weight: 500
        }

        .box input[type="text"]:focus,
        .box input[type="password"]:focus {
            width: 300px;
            border-color: #2ecc71
        }

        .box input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #2ecc71;
            padding: 14px 40px;
            outline: none;
            color: black;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer
        }

        .box input[type="submit"]:hover {
            background: #2ecc71
        }

        .forgot {
            text-decoration: underline
        }

        ul.social-network {
            list-style: none;
            display: inline;
            margin-left: 0 !important;
            padding: 0
        }

        ul.social-network li {
            display: inline;
            margin: 0 5px
        }

        .social-network a.icoFacebook:hover {
            background-color: #3B5998
        }

        .social-network a.icoTwitter:hover {
            background-color: #33ccff
        }

        .social-network a.icoGoogle:hover {
            background-color: #BD3518
        }

        .social-network a.icoFacebook:hover i,
        .social-network a.icoTwitter:hover i,
        .social-network a.icoGoogle:hover i {
            color: #fff
        }

        a.socialIcon:hover,
        .socialHoverClass {
            color: #44BCDD
        }

        .social-circle li a {
            display: inline-block;
            position: relative;
            margin: 0 auto 0 auto;
            border-radius: 50%;
            text-align: center;
            width: 50px;
            height: 50px;
            font-size: 20px
        }

        .social-circle li i {
            margin: 0;
            line-height: 50px;
            text-align: center
        }

        .social-circle li a:hover i,
        .triggeredHover {
            transform: rotate(360deg);
            transition: all 0.2s
        }

        .social-circle i {
            color: #fff;
            transition: all 0.8s;
            transition: all 0.8s
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form action="index.php" method="POST" class="box">
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
                        <h1>Login</h1>
                        <p class="text-muted"> Please enter your login and password!</p>
                        <input type="text" name="username" placeholder="enter your email">
                        <input type="password" name="password" placeholder="password">
                        <input type="submit"  value="Login" href="#">

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html> -->