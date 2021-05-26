<?php
    include "db/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="res/css/bootstrap.css">
    <link rel="stylesheet" href="res/css/sweetalert2.min.css">
    <link rel="stylesheet" href="res/css/all.min.css">

    <script src="res/js/jquery-3.3.1.js"></script>
    <script src="res/js/popper.js"></script>
    <script src="res/js/bootstrap.js"></script>
    <script src="res/js/ajaxable.min.js"></script>
    <script src="res/js/all.min.js"></script>
    <script src="res/js/sweetalert2.all.min.js"></script>
    <script src="res/js/jquery.mask.js"></script>

    <title>Form Registrasi</title>
</head>
<body>


    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Form Registrasi Alamat Mahasiswa</a>
        </nav>
        <br>
        <form id="formRegis" name="formRegis" action="proses-ajax.php" method="post">
            <div class="form-group">              
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">              
            </div>
            <div class="form-group        ">              
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" >              
            </div>
            <div class="form-group">              
              <input type="number" step="0.01"  name="umur" id="umur" class="form-control" placeholder="Umur (Th)">              
            </div>

            <div class="row">
                <div class="form-group col-md-3 ">           
                    <input type="date" name="tgl" id="tanggal" class="form-control" placeholder="Tgl Lahir">              
                    </div>

                    <div class="form-group col-md-3">           
                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp">              
                </div>    
            </div>
        
            <div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Kirim</button>                
            </div>
        </form>
    </div>

    <!-- Menggunakan Metode #2 AJAX -->
    <script>
        $(document).ready(function () {
            ajaxable("#formRegis")
            .onStart(function(params) {
                })
                .onEnd(function(params) {
                })
                .onResponse(function(res, params) {
                    if (res=='200') {
                        swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Yes.. Data berhasil disimpan',
                            showConfirmButton: true,
                            confirmButtonText:"Siip lah", //tidak berfungsi jika prop showConfirmButton di set false                             
                            timer: 1000
                            // "warning"
                            // "error"
                            // "success"
                            // "info"
                            // "question"

                            // Popup window position, can be 
                            // 'top', 
                            // 'top-start', 
                            // 'top-end', 
                            // 'center', 
                            // 'center-start', 
                            // 'center-end', 
                            // 'bottom', 
                            // 'bottom-start', or 
                            // 'bottom-end'.
                        });
                        
                    } else {
                        swal.fire('Err: 400 Maaf: Isi data dengan lengkap');
                    }
                    $("#formRegis").trigger('reset');
                })
                .onError(function(err, params) {
                // Make stuff on errors
                    alert("Error: "+res);
                    swal.fire("Error: Tidak ada data Untuk disimpan");
                });
        });


        $('#telp').mask("00/00/0000",{placeholder:"00/00/0000"});
    </script>
</body>
</html>