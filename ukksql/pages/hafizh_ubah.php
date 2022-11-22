<?php
$idcatatan = $_GET['id'];

include '../koneksi.php';
$sql = "SELECT*FROM catatan WHERE idCatatan='$idcatatan'";
$query = mysqli_query( $conn, $sql );
$value = mysqli_fetch_array( $query );
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        box-sizing: border-box;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    .textcont {
        width: 50%;
        height: 50%;
        padding: 5px;
        border: 1px solid black;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    td {
        padding: 10px 0;
    }

    input {
        width: 100%;
        padding: 3px;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php include "header.php";?>
        <form action="" method="POST" class="textcont">
            <input type="hidden" name="" value="<?php echo $idcatatan ?>">
            <table width="70%">
                <tr>
                    <td>Tanggal</td>
                    <td><input value="<?php echo $value['tanggal'] ?>" type="date" name="tanggal" required></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td><input value="<?php echo $value['waktu'] ?>" type="time" name="jam" required></td>
                </tr>
                <tr>
                    <td>Lokasi yang dikunjungi</td>
                    <td><input value="<?php echo $value['lokasi'] ?>" type="text" name="lokasi" required></td>
                </tr>
                <tr>
                    <td>Suhu Tubuh</td>
                    <td><input value="<?php echo $value['suhu'] ?>" type="text" name="suhu" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Ubah" name="ubah"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<!-- PHP HTML BREAK -->
<?php
if ( isset( $_POST['ubah'] ) ) {
    session_start();
    $nik = $_SESSION['nik'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];

    include '../koneksi.php';
    $sql = "UPDATE catatan SET tanggal='$tanggal', waktu='$waktu', lokasi='$lokasi', suhu='$suhu' WHERE idCatatan='$idcatatan'";
    $query = mysqli_query( $conn, $sql );

    if ( $query ) {
        echo '<script>alert("Data catatan berhasil diubah!");</script>';
        echo '<script>window.location.assign("hafizh_catatanperjalanan.php");</script>';
    } else {
        echo '<script>alert("Data gagal diubah");</script>';
    }

}

?>