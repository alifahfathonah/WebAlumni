<?php

//koneksi database
$konek = mysqli_connect("localhost", "root", "", "db_methodist");
$handle = fopen($_FILES['file']['tmp_name'], "r");
while (($data = fgetcsv($handle, 1000, ",")) !== false) {
    $cek = mysqli_query($konek, "select * from alumni where no_alumni='$data[0]'");
    $banyak = mysqli_num_rows($cek);
    if ($banyak < 1) {
        $simpan = mysqli_query($konek, "insert into alumni values ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','Sistem Informasi')");
    }
}
 ?>