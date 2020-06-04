<?php
require("connect.php");


date_default_timezone_set('Asia/Jakarta');
$tahun = date('Y');



//menampilkan data
$x = $_GET['x'];
$alumni = query("select *from alumni where prodi='$x'");
//tombol cari 

if (isset($_POST["cari"])) {
    $alumni = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hover.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <title>Alumni Universitas Methodist Indonesia</title>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Universitas Methodist Indonesia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <div class="dropdown nav-item nav-link">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Prodi
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="prodisi.php?x=Teknik Informatika">Teknik informatika</a>
                            <a class="dropdown-item" href="prodisi.php?x=Sistem Informasi">Sistem Informasi</a>

                        </div>
                    </div>
                    <a class="nav-item nav-link" href="berita.php">Berita</a>
                    <a class="nav-item nav-link " href="loker.php">Lowongan Kerja</a>
                    <a class="nav-item nav-link " href="about.php">About</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">

        </div>
    </div>
    <!-- akhir jumbotron -->

    <!--table alumni-->
    <div class="container">
        <h4 class="text-center text-primary mb-4 mt-4">Database Alumni <br>Program Studi
            <?php echo $x; ?>
        </h4>


        <table class="table table-borderless" id="table_id">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Alumni</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Judul Skripsi</th>

                    <th scope="col">Tahun Lulus</th>
                    <th scope="col">Tanggal Wisuda</th>
                    <th scope="col">Program Studi</th>
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
                        <?php echo $row['nama_alumni']; ?>
                    </td>
                    <td>
                        <?php echo $row['nim']; ?>
                    </td>
                    <td>
                        <?php echo $row['judul_skripsi']; ?>
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
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
        <!--navigasi-->




        <!--akhir-->
    </div>
    <!--akhir table alumni-->

    <!--footer-->
    <div id=footer>
        <div class="container-fluid bg-primary">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <h5>Kampus I</h5>
                        <hr>
                        <p>Jl Hang Tuah no 8
                            Madras Hulu Medan Polonia Medan</p>
                        <p> P: (061) 415-7882</p>
                        <p> F: (061) 456-7533</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Kampus II</h5>
                        <hr>
                        <p>Jl Setia Budi
                            Pasar II Tanjung Sari Medan</p>
                        <p> P: (061) 821-2160</p>
                        <p> F: (061) 821-2161</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Kampus III</h5>
                        <hr>
                        <p>Jl Harmonika Baru
                            Pasar II Tanjung Sari Medan</p>
                        <p>P: (061) 821-2162</p>
                        <p> F: (061) 821-2161</p>
                    </div>

                </div>
            </div>


            <div class="row footer">
                <div class="col text-center">
                    <p>
                        <?php echo $tahun; ?> FIKOM-UMI &copy; By Gorbyno Sitepu All Reserved Email : bynogan@gmail.com</p>
                </div>
            </div>
        </div>
        <!--akhir footer-->
    </div>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="
            js/jquery-3.3.1.min.js"> </script>
    <!-- Include all compiled plugins (below), or include individual files
            as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!--jquery sendiri-->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html> 