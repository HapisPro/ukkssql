<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan perjalanan</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    .table {
        border: 1px solid black;
        margin: 2px auto;
        overflow: scroll;
    }

    .btncont {
        margin: 10px auto 0 auto;
    }

    th:hover {
        opacity: .5;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php include "header.php"?>
        <table align="center" width="50%" class="table">
            <td>
                <a>Urutkan Berdasarkan</a>
                <select id="urut" onclick="urutkan(this)">
                    <option>Pilih</option>
                    <option value="1">Tanggal</option>
                    <option value="2">Waktu</option>
                    <option value="3">Lokasi</option>
                    <option value="4">Suhu</option>
                </select>
            </td>
        </table>
        <br>
        <table align="center" width="50%" height="40%" class="table">
            <td>
                <table align="center" width="90%" border="1" class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Suhu Tubuh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
$i = 1;
$cek = true;
include '../koneksi.php';
$sql = "SELECT*FROM catatan WHERE nik='$_SESSION[nik]'";
$query = mysqli_query( $conn, $sql );
foreach ( $query as $value ) {
    $cek = false;
    ?>

                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $value['tanggal'] ?></td>
                            <td><?php echo $value['waktu'] ?></td>
                            <td><?php echo $value['lokasi'] ?></td>
                            <td><?php echo $value['suhu'] ?></td>
                            <td align="center">
                                <a href="hafizh_ubah.php?id=<?php echo $value['idCatatan'] ?>">Edit</a> |
                                <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                                    href="hafizh_hapus.php?id=<?php echo $value['idCatatan'] ?>"
                                    style="color: red;">Hapus</a>
                            </td>

                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <table align="center" width="90%" class="btncont">
                    <td align="right">
                        <a href="hafizh_isidata.php"><img src="../assets/add.png" alt="" width="40px"></a>
                    </td>
                </table>
            </td>
        </table>
    </div>
    <script src="main.js"></script>
</body>

</html>

<?php
if ( $cek ) {
    echo '<script>alert("Anda belum mengisi data, Silakan mengisi data dahulu"); window.location = "hafizh_isidata.php";</script>';
}
?>