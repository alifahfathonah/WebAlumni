<?php
require("connect.php");


date_default_timezone_set('Asia/Jakarta');
$tahun = date('Y');

$berita = query("select *from berita order by tanggal desc");

//pagination
$jumlahdataperhalaman = 2;
$jumlahdata = count(query("select *from berita"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;


//menampilkan data

$beritaside = query("select *from berita order by tanggal desc  limit 0,3");




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

    <!--artikel-->
    <div class="container-fluid my-4">
        <h1 class="font-weight-bolder text-center text-info">Berita Terkini</h1>
        <div class="container my-4">
            <div class="row">

                <div class="col-md-8">
                    <?php foreach ($berita as $row): ?>
                    <div class="artikel">

                        <img src="icon/pengumuman.svg" alt="" width=50 height=50 class="float-left mr-3">

                        <h4 class="mt-3">
                            <?php echo $row["judul"]; ?>
                        </h4>
                        <p class='text-secondary'>Post :
                            <?php echo $row['tanggal']; ?>
                        </p>
                        <hr>
                        <hr>

                        <p class="text-justify">

                            <?php echo substr($row["isi"], 0, 200); ?><a href="readberita.php?id_berita=<?php echo $row['id_berita']; ?>" class="badge badge-primary"> Read More</a></p>

                        </p>

                    </div>
                    <?php endforeach; ?>
                </div>


                <div class="col-md-4">

                    <img src="icon/artikel.svg" alt="" width=50 height=50 class="float-left mr-3">
                    <h4 class="mt-3">Berita Terbaru</h4>
                    <?php foreach ($beritaside as $row): ?>
                    <hr>
                    <img src="images/<?php echo $row['images']; ?>" alt="" width=100 height=70 class="float-left mr-1">
                    <h6 class="">
                        <?php echo $row["judul"]; ?>
                    </h6>
                    <p class="text-justify">
                        <?php echo substr($row["isi"], 0, 200); ?><a href="readberita.php?id_berita=<?php echo $row['id_berita']; ?>" class="badge badge-primary">Read More</a></p>

                    <br>
                    <?php endforeach; ?>




                </div>

            </div>

        </div>

    </div>


    <!--akhir artikel-->

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