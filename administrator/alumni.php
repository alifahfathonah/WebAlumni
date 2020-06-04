<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
require("../connect.php");

$alumni = query("select *from alumni");
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
                        <h1>Alumni</h1>
                        <ol class="breadcrumb">
                            <li><a href=""><i class="fa fa-home"></i> </a></li>
                            <li class="active"><i class="fa fa-users"></i> Alumni</li>
                        </ol>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="form-group">
                            <a href="tambahalumni.php" class="btn btn-primary">+ Tambah Data Baru</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless" id="table_id">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Alumni</th>
                                        <th scope="col">Nama Alumni</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Judul Skripsi</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Tanggal Lulus</th>
                                        <th scope="col">Tanggal Wisuda</th>
                                        <th scope="col">Program Studi</th>
                                        <th class="header" style="width:150px;">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($alumni as $row): ?>

                                    <tr>
                                        <th scope="row">
                                            <?php echo $i; ?>
                                        </th>
                                        <td>
                                            <?php echo $row['no_alumni']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama_alumni']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nim']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['judul_skripsi']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ipk']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['tanggal_lulus']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['tanggal_widsuda']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['prodi']; ?>
                                        </td>
                                        <td>

                                            <a class="btn btn-warning btn-sm" href="editalumni.php?no_alumni=<?php echo $row[" no_alumni"]; ?>">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="hapusalumni.php?no_alumni=<?php echo $row[" no_alumni"]; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

</body>

</html> 