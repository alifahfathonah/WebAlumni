<?php
require("../connect.php");

$id_loker = $_GET["id_loker"];
if (hapusloker($id_loker) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'loker.php';
        </script>";

} else {
    echo " <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
        </script>";
}
?>