<?php
require("../connect.php");

$id_berita = $_GET["id_berita"];
if (hapusberita($id_berita) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'berita.php';
        </script>";

} else {
    echo " <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
        </script>";
}
?>