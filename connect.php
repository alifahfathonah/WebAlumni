<?php

//koneksi database
$konek = mysqli_connect("localhost", "root", "", "db_methodist");

function query($query)
{
    global $konek;
    $result = mysqli_query($konek, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function cari($keyword)
{
    $query = "SELECT *FROM alumni where nama_alumni LIKE  '%$keyword%'OR
     nim LIKE  '%$keyword%' OR
     prodi LIKE  '%$keyword%'
     ";

    return query($query);
}

function tambahloker($data)
{

    global $konek;


    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    date_default_timezone_set('Asia/Jakarta');
    $tgl_post = date('Y-m-d H:i:s');
    $tgl_close = htmlspecialchars($data["tgl_close"]);
    //upload gambar
    $images = upload();
    if (!$images) {
        return false;
    }


    $query = "INSERT INTO loker
    VALUES('','$perusahaan','$lokasi','$deskripsi','$tgl_post','$tgl_close','$images')";
    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}
function tambahberita($data)
{

    global $konek;



    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $judul = htmlspecialchars($data["judul"]);
    $id_user = htmlspecialchars($data["id_user"]);
    $isi = htmlspecialchars($data["isi"]);
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
    //upload gambar
    $images = upload();
    if (!$images) {
        return false;
    }


    $query = "INSERT INTO berita
    VALUES('','$id_kategori','$judul','$isi','$tanggal','$images','$id_user')";
    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}



function upload()
{
    $namafile = $_FILES['images']['name'];
    $ukuranfile = $_FILES['images']['size'];
    $error = $_FILES['images']['error'];
    $tmpName = $_FILES['images']['tmp_name'];

    //cek apakah ada gamabar yang di upload
    if ($error === 4) {
        echo "
        <script>alert('pilih gambar terlebih dahulu');</script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar

    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "
        <script>alert('yang anda upload bukan gambar !');</script>";
        return false;
    }
    //cek jika ukurannya terlalu besar
    if ($ukuranfile > 1000000) {
        echo "
        <script>alert('ukuran gambar terlalu besar  !');</script>";
        return false;
    }

    //gambar diupload
    //generete nama gambar
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpName, '../images/' . $namafilebaru);

    return $namafilebaru;
}

function tambahkontak($data)
{
    global $konek;

    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $email = htmlspecialchars($data["email"]);

    $isi = htmlspecialchars($data["isi"]);

    $query = "insert into kontak values('','$nama_lengkap','$email','$isi')";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}



function tambahalumni($data)
{
    global $konek;
    $no_alumni = htmlspecialchars($data["no_alumni"]);
    $nim = htmlspecialchars($data["nim"]);
    $nama_alumni = htmlspecialchars($data["nama_alumni"]);
    $judul_skripsi = htmlspecialchars($data["judul_skripsi"]);
    $ipk = htmlspecialchars($data["ipk"]);
    $tanggal_lulus = htmlspecialchars($data["tanggal_lulus"]);
    $tanggal_widsuda = htmlspecialchars($data["tanggal_widsuda"]);
    $prodi = htmlspecialchars($data["prodi"]);

    $query = "insert into alumni values('$no_alumni','$nim','$nama_alumni','$judul_skripsi','$ipk','$tanggal_lulus','$tanggal_widsuda','$prodi')";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}
function hapusalumni($no_alumni)
{
    global $konek;
    mysqli_query($konek, "DELETE FROM alumni where no_alumni=$no_alumni");

    return mysqli_affected_rows($konek);
}
function hapusloker($id_loker)
{
    global $konek;
    mysqli_query($konek, "DELETE FROM loker where id_loker=$id_loker");

    return mysqli_affected_rows($konek);
}
function hapuskontak($id_kontak)
{
    global $konek;
    mysqli_query($konek, "DELETE FROM kontak where id_kontak=$id_kontak");

    return mysqli_affected_rows($konek);
}

function hapususer($id_user)
{
    global $konek;
    mysqli_query($konek, "DELETE FROM user where id_user=$id_user");

    return mysqli_affected_rows($konek);
}
function hapusberita($id_berita)
{
    global $konek;
    mysqli_query($konek, "DELETE FROM berita where id_berita=$id_berita");

    return mysqli_affected_rows($konek);
}

function ubahalumni($data)
{

    global $konek;

    $no_alumni = $data["no_alumni"];

    $nama_alumni = htmlspecialchars($data["nama_alumni"]);
    $judul_skripsi = htmlspecialchars($data["judul_skripsi"]);
    $ipk = htmlspecialchars($data["ipk"]);
    $tanggal_lulus = htmlspecialchars($data["tanggal_lulus"]);
    $tanggal_widsuda = htmlspecialchars($data["tanggal_widsuda"]);
    $prodi = htmlspecialchars($data["prodi"]);


    $query = "UPDATE alumni SET 
   
     nama_alumni='$nama_alumni',
     judul_skripsi='$judul_skripsi',
     ipk='$ipk',
     
     tanggal_lulus = '$tanggal_lulus',
     tanggal_widsuda = '$tanggal_widsuda',
     prodi = '$prodi'
    
     
     where no_alumni = $no_alumni";

    mysqli_query($konek, $query);


    return mysqli_affected_rows($konek);
}


function ubahloker($data)
{

    global $konek;

    $id_loker = $data["id_loker"];


    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    date_default_timezone_set('Asia/Jakarta');
    $tgl_post = date('Y-m-d H:i:s');
    $tgl_close = htmlspecialchars($data["tgl_close"]);

    $gambarlama = htmlspecialchars($data["gambarlama"]);

    //cek apakah user milih gambar baru atau tidak
    if ($_FILES['images']['error'] === 4) {
        $images = $gambarlama;
    } else {
        $images = upload();
    }



    $query = "UPDATE loker SET 

     perusahaan='$perusahaan',
     lokasi='$lokasi',
     deskripsi='$deskripsi',
     
     tgl_post = '$tgl_post',
     tgl_close = '$tgl_close',
     images='$images'
     
     where id_loker = $id_loker";

    mysqli_query($konek, $query);


    return mysqli_affected_rows($konek);
}


function ubahberita($data)
{

    global $konek;

    $id_berita = $data["id_berita"];


    $id_user = htmlspecialchars($data["id_user"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $judul = htmlspecialchars($data["judul"]);

    $isi = htmlspecialchars($data["isi"]);
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    //cek apakah user milih gambar baru atau tidak
    if ($_FILES['images']['error'] === 4) {
        $images = $gambarlama;
    } else {
        $images = upload();
    }


    $query = "UPDATE berita SET 

     id_kategori='$id_kategori',
   
     judul='$judul',
     
     isi = '$isi',
     tanggal = '$tanggal',
    
     images='$images',
     id_user='$id_user'
     
     where id_berita = $id_berita";

    mysqli_query($konek, $query);


    return mysqli_affected_rows($konek);
}


function ubahuser($data)
{

    global $konek;

    $id_user = $data["id_user"];

    $nama_user = strtolower(stripslashes($data["nama_user"]));
    $username = strtolower(stripslashes($data["username"]));
    $akses = strtolower(stripslashes($data["akses"]));
    $password = mysqli_real_escape_string($konek, $data["password"]);
    $password2 = mysqli_real_escape_string($konek, $data["password2"]);




    //chek konfirmasi password
    if ($password !== $password2) {
        echo " <script>alert('konfimasi password tidak sesuai ')</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    $query = "UPDATE user SET 
     nama_user='$nama_user',
     username='$username',
     akses='$akses',
     password = '$password'
     where id_user = $id_user";

    mysqli_query($konek, $query);


    return mysqli_affected_rows($konek);
}






function registrasi($data)
{
    global $konek;

    $nama_user = strtolower(stripslashes($data["nama_user"]));
    $username = strtolower(stripslashes($data["username"]));
    $akses = strtolower(stripslashes($data["akses"]));
    $password = mysqli_real_escape_string($konek, $data["password"]);
    $password2 = mysqli_real_escape_string($konek, $data["password2"]);


    //chek konfirmasi password
    if ($password !== $password2) {
        echo " <script>alert('konfimasi password tidak sesuai ')</script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //cek username sudah ada atau belum
    $result = mysqli_query($konek, "SELECT username from user where username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo " <script>
                alert('username sudah terdaftar');
                </script>";
        return false;
    }
    //tambahkan user baru kedatabase
    mysqli_query($konek, "INSERT INTO user VALUES('','$nama_user','$username','$password','$akses')");

    return mysqli_affected_rows($konek);
}

 