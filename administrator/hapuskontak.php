<?php
require("../connect.php");

$id_kontak = $_GET["id_kontak"];
if (hapuskontak($id_kontak) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'kontak.php';
        </script>";

} else {
    echo " <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
        </script>";
}
?>