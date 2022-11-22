<?php
$idcatatan = $_GET['id'];

include '../koneksi.php';
$sql = "DELETE FROM catatan WHERE idCatatan='$idcatatan'";
$query = mysqli_query( $conn, $sql );

if ( $query ) {
    echo '<script>alert("Data berhasil dihapus"); window.location = "hafizh_catatanperjalanan.php";</script>';
} else {
    echo 'alert("Data gagal dihapus");';
}
?>