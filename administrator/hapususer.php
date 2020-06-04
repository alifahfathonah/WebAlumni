<?php
require("../connect.php");

$id_user = $_GET["id_user"];
if (hapususer($id_user) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'user.php';
        </script>";

} else {
    echo " <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
        </script>";
}
?>