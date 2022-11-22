<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Data</title>
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
            <table width="70%">
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal" required></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td><input type="time" name="jam" required></td>
                </tr>
                <tr>
                    <td>Lokasi yang dikunjungi</td>
                    <td><input type="text" name="lokasi" required></td>
                </tr>
                <tr>
                    <td>Suhu Tubuh</td>
                    <td><input type="text" name="suhu" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan" name="simpan"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<!-- PHP HTML BREAK -->
<?php
if ( isset( $_POST['simpan'] ) ) {
    session_start();
    $nik = $_SESSION['nik'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];

    include '../koneksi.php';
    $sql = "INSERT INTO catatan(nik,tanggal,waktu,lokasi,suhu) VALUES ('$nik','$tanggal','$waktu','$lokasi','$suhu')";
    $query = mysqli_query( $conn, $sql );

    if ( $query ) {
        echo '<script>alert("Data catatan berhasil disimpan!");</script>';
        echo '<script>window.location.assign("hafizh_catatanperjalanan.php");</script>';
    } else {
        echo '<script>alert("Data catatan tidak tersimpan");</script>';
    }

}

?>