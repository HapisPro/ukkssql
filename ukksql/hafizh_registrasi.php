<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
        overflow: hidden;
    }

    .formcont {
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tablecont {
        width: 30%;
        height: 40%;
    }

    input {
        margin: 3px auto;
    }

    .tablecont .form {
        width: 100%;
        padding: 3px;
    }
    </style>
</head>

<body>
    <form action="" method="POST" class="formcont">
        <table class="tablecont">
            <tr>
                <td style="text-align: center">
                    <h1>Registrasi</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nik" placeholder="NIK" class="form" required>
                </td>
            </tr>

            <tr>
                <td>
                    <input type=" text" name="nama" placeholder="Nama Lengkap" class="form" required>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <input type="submit" name="regist" value="Daftar" style="padding: 3px 10px; width: 100%;">
                    <small>Sudah punya akun? <a href="hafizh_login.php">Login disini</a></small>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<!-- PHP HTML BREAK -->

<?php
if ( isset( $_POST["regist"] ) ) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    include 'koneksi.php';
    $validation = "SELECT*FROM user WHERE nik= '$nik'";
    $query = mysqli_query( $conn, $validation );

    if ( mysqli_num_rows( $query ) == 0 ) {
        $query_regist = mysqli_query( $conn, "INSERT INTO user(nik, nama) VALUES ('$nik', '$nama')" );
        if ( $query_regist ) {?>
<script>
alert("Registrasi berhasil! Silakan login");
window.location.assign("hafizh_login.php");
</script>
<?php }
    } else {?>
<script>
alert("NIK sudah terdaftar!");
window.location.assign("hafizh_registrasi.php");
</script>
<?php }
}
?>