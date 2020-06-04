<?php
session_start();
require("../connect.php");

// set cookie
if (isset($_COOKIE['id_user']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id_user'];
    $key = $_COOKIE['key'];

    //ambil usrname berdasarkan id
    $result = mysqli_query($konek, "SELECT username FROM user where id_user=$id_user");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username

    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;

        exit;
    }
}

if (isset($_SESSION["login"])) {
    header("location : index.php");
    exit;
}


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($konek, "SELECT *FROM user WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {

        // chek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            //set session
            extract($row);
            $_SESSION["login"] = true;
            $_SESSION['nama_user'] = $nama_user;
            $_SESSION['username'] = $username;
            $_SESSION['akses'] = $akses;
            $_SESSION['id_user'] = $id_user;


            //cek remember me
            if (isset($_POST['remember'])) {
                //buat cookie

                setcookie('id_user', $row['id_user'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("location: index.php");
            exit;
        }
    }
    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alumni Universitas Methodist Indonesia</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom Fonts -->
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">


                <form class="form-signin" method="POST" action="">

                    <div class="form-group">
                        <div class="text-center text-header">
                            <img src="../images/avatar4.png" style="width:75px;" alt="logo">
                            <h3 class="text-primary">Universitas Methodist Indonesia</h3>
                            <h4 class="text-primary">Login Administrator</h4>
                        </div>
                    </div>
                    <hr>
                    <?php if (isset($error)): ?>
                    <p style="color:red; font-style:italic;">username atau password salah</p>
                    <?php endif; ?>
                    <div class="form-group">

                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="ex : Gorbyno" required autofocus>
                    </div>
                    <div class="form-group">

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">remember me</label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="login">Sign in</button>
                </form>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--jquery sendiri-->
    <script src="js/script.js"></script>
</body>

</html> 