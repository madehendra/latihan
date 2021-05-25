<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/bootstrap.css">
    <link rel="stylesheet" href="res/css/sweetalert2.min.css">
    <title>Register</title>
</head>
<body>

    <script>
        function swAlert() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil Disimpan',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
    <div class="container">
        <?php 
            if (isset($_POST['submit']) && isset($_POST['email']) && !empty($_POST['email'])  ) {
                // Jika di submit
                // Lakukan koneksi ke mysql server
                $con = mysqli_connect("localhost","root","","latihan");
                $sql = "SELECT * FROM tbluser WHERE email = '" . $_POST['email'] . "'";
                $result = mysqli_query($con,$sql);

                if (mysqli_num_rows($result)>0) {
                    // alamat email sudah dipakai
                    echo "Alamat email sudah dipakai. Data tidak bisa disimpan. Gunakan alamat email yg lain";
                } else {
                    // jika tidak, maka simpan
                    $sql = "INSERT INTO tbluser (nama,email,passw) values ('" . $_POST['nama'] . "','" . $_POST['email'] . "','" . $_POST['passw'] . "')";
                    $result = mysqli_query($con,$sql);
                    if ($result) {
                        // echo "Data Berhasil disimpan, silahkan login";
                        ?>
                        <script>
                            swAlert();
                        </script>
                        <?php
                    
                    } else {
                        echo "Error. data tidak bisa disimpan";
                    }
                    
                }
            }else{
                echo "Mohon dilengkapi isian terlebih dahulu";
            }
        ?>

        <div ><h1>FORM REGISTRASI</h1></div>
        <form name = "frmRegister" action=" <?php  $_SERVER['PHP_SELF'];  ?> " method="post">
            <div class="form-group">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
            <input type="password" name="passw" id="passw" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal" >
            </div>
            <div class="form-group">
              <input type="email" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" >
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                <button type="button" id="btnLogin" class="btn btn-info">Login</button>
            </div>
        </form>
    </div>
    <script src="res/js/jquery-3.3.1.js"></script>
    <script src="res/js/popper.js"></script>
    <script src="res/js/bootstrap.js"></script>
    <script src="res/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#btnLogin").click(function () { 
                $(location).attr('href', 'login.php');
            });
        });
    </script>

</body>
</html>