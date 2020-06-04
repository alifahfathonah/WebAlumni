<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
require("../connect.php");

if (isset($_POST["submit"])) {




    //cek data berhasil atau tidak

    if (tambahloker($_POST) > 0) {

        echo "
            <script>
            alert('data berhasil masuk');
            document.location.href = 'loker.php';
            </script>";
    } else {
        echo " <script>
            alert('data gagal');
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

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
                        <h1>Tambah Lowongan Kerja</h1>
                        <ol class="breadcrumb">
                            <li><a href=""><i class="fa fa-home"></i> </a></li>
                            <li><a href="?page=artikel"><i class="fa fa-newspaper-o"></i> Lowongan Kerja</a></li>
                            <li class="active"><i class="fa fa-pencil"></i> Tambah Lowongan Kerja</li>
                        </ol>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">



                        <form method="post" role="form" enctype="multipart/form-data">
                            <table class="table-responsive table">

                                <tbody>


                                    <tr>
                                        <td style="width: 200px;"><label>Perusahaan</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="text" name="perusahaan" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><label>Lokasi</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="text" name="lokasi" class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 200px;"><label>Tanggal Close</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="date" name="tgl_close" class="form-control" placeholder="yyyy/mm/dd">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><label>Gambar</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <input type="file" name="images" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;"><label>Deskripsi</label></td>
                                        <td style="width: 1px;">:</td>
                                        <td>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="7"> </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script src="tinymce/tinymce.min.js"></script>



</body>

</html> 