<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <h1>Login</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nik" placeholder="NIK" class="form">
                </td>
            </tr>

            <tr>
                <td>
                    <input type=" text" name="nama" placeholder="Nama Lengkap" class="form">
                </td>
            </tr>

            <tr>
                <td align="center">
                    <input type="submit" name="login" value="Masuk" style="padding: 3px 10px; width: 100%;">
                    <small>Belum mempunyai akun? <a href="hafizh_registrasi.php">Registrasi disini</a></small>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<!-- PHP HTML BREAK -->
<?php
if ( isset( $_POST["login"] ) ) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];

    include "koneksi.php";
    $query = mysqli_query( $conn, "SELECT*FROM user WHERE nik='$nik' AND nama='$nama'" );
    if ( mysqli_num_rows( $query ) == 0 ) {
        echo '<script>alert("NIK dan Nama belum terdaftar");</script>';
    } else {
        session_start();
        $_SESSION['nik'] = $nik;
        $_SESSION['nama'] = $nama;
        $_SESSION['login'] = true;

        header( "location: pages/hafizh_home.php" );
    }
}
?>