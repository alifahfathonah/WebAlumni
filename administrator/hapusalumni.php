<?php
require("../connect.php");

$no_alumni = $_GET["no_alumni"];
if (hapusalumni($no_alumni) > 0) {
    echo "
        <script>
        alert('data berhasil dihapus');
        document.location.href = 'alumni.php';
        </script>";

} else {
    echo " <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
        </script>";
}
?>