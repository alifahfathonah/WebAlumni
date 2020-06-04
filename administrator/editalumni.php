<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
require("../connect.php");

//ambil data
$no_alumni = $_GET['no_alumni'];

$alumni = query("SELECT *FROM alumni where no_alumni=$no_alumni")[0];

if (isset($_POST["submit"])) {




    //cek data berhasil atau tidak

    if (ubahalumni($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'alumni.php';
        </script>";
    } else {
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'index.php';
        </script>";
    }
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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Alumni Universitas Methodist Indonesia</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="setting.php"><i class="fa fa-fw fa-check"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-home"></i>
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="../index.php" target="_blank"><i class="fa fa-fw fa-paper-plane"></i> Lihat Website</a>
                    </li>

                    <li>
                        <a href="berita.php"><i class="fa fa-fw fa-newspaper"></i>
                            Berita</a>
                    </li>
                    <li>
                        <a href="upload.php"><i class="fa fa-fw fa-upload"></i>
                            Upload</a>
                    </li>


                    <li>
                        <a href="alumni.php"><i class="fa fa-fw fa-users"></i>
                            Data Alumni</a>
                    </li>
                    <li>
                        <a href="treasure.php"><i class="fa fa-fw fa-user"></i>
                            Treasure</a>
                    </li>
                    <li>
                        <a href="loker.php"><i class="fa fa-fw fa-search"></i>
                            Loker</a>
                    </li>
                    <li>
                        <a href="kontak.php"><i class="fa fa-fw fa-phone-square"></i>
                            Kontak</a>
                    </li>
                    <li>
                        <a href="user.php"><i class="fa fa-fw fa-users"></i>
                            Manajemen User</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Edit Alumni</h1>
                        <ol class="breadcrumb">
                            <li><a href=""><i class="fa fa-home"></i> </a></li>
                            <li><a href="?page=user"><i class="fa fa-users"></i> Alumni</a></li>
                            <li class="active"><i class="fa fa-pencil"></i> Edit Alumni</li>
                        </ol>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">


                        <div class="alert alert-info">
                            Harap Di isi Semua Bagian
                        </div>

                        <form method="post" role="form" enctype="multipart/form-data">
                            <input type="hidden" name="no_alumni" value="<?php echo $alumni[" no_alumni"]; ?>">
                            <table class="table-responsive table">

                                <tbody>

                                    <tr>
                                        <td style="width: 200px;"><label>Nama Lengkap</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="text" name="nama_alumni" value="<?php echo $alumni[" nama_alumni"]; ?>" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>NIM</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="text" name="nim" value="<?php echo $alumni[" nim"]; ?>" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Judul Skripsi</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="text" name="judul_skripsi" value="<?php echo $alumni[" judul_skripsi"]; ?>" class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 200px;"><label>IPK</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="text" name="ipk" class="form-control" value="<?php echo $alumni[" ipk"]; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><label>Tanggal Lulus</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="text" name="tanggal_lulus" class="form-control" value="<?php echo $alumni[" tanggal_lulus"]; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><label>Tanggal wisuda</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="date" name="tanggal_widsuda" class="form-control" value="<?php echo $alumni[" tanggal_widsuda"]; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><label>Program Studi</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <select class="form-control" name="prodi">
                                                <option value="Teknik Informatika">Teknik Informatika</option>
                                                <option value="Sistem Informasi">Sistem Informasi</option>
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </form>

                    </div>
                </div>

            </div>


        </div>

        <!-- /.row -->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!--jquery sendiri-->
        <script src="js/script.js"></script>
</body>

</html> 