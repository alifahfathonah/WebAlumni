<?php
require("connect.php");

date_default_timezone_set('Asia/Jakarta');
$tahun = date('Y');

if (isset($_POST["submit"])) {

    //cek data berhasil masuk
    if (tambahkontak($_POST) > 0) {

        echo "
        <script>
        alert('data berhasil masuk');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo " <script>
        alert('data gagal');
        document.location.href = 'kontak.php';
        </script>";
    }
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 shadow-lg p-3 mb-5 bg-white rounded">
                <span class="fa fa-address-card float-left mr-3" style="font-size:60px;color:rgb(184, 105, 105)"></span>
                <h3>Hubungi Kami</h3>
                <p class="small text-secondary">Kirim Saran Dan Komentar</p>
                <form action="" method="POST" class="my-5" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="mail" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Isi:</label>
                        <textarea class="form-control" name="isi" rows="5"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-4">
                <div class="ml-1">
                    <h4 class="text-primary"> Kontak</h4>
                    <hr>
                    <h6>BIRO REKTORAT UMI</h6>
                    <p>Jl Hang Tuah no 8, Madras Hulu Medan Polonia, Medan, 20151 </p><br>

                    <p> Phone. +62 61 415-7882</p>
                    <P>Fax. +62 61 456-7533</P>
                </div>
            </div>
        </div>
    </div>

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


</body>

</html> 