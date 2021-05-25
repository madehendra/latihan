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
    <title>Form Registrasi</title>
</head>
<body>

    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Form Registrasi Alamat Mahasiswa</a>
        </nav>
        <form id="formRegis" name="formRegis" action="proses-ajax.php" method="post">
            <div class="form-group">              
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">              
            </div>
            <div class="form-group">              
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" >              
            </div>
            <div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Kirim</button>                
            </div>
        </form>
    </div>

    <div class="container">
    <?php 
        $sql = "select * from anggota";
        $res = $db->prepare($sql);
        $res->execute();
        $con = $res->get_result();
        if ($con->num_rows>0 ) {
            # code...
            while ($row = $con->fetch_assoc()) {
                # code...
                echo $row['nama'] . " " . $row['alamat'] . '<br>';
            }
        } else {
            # code...
        }
        
     ?>    
    </div>
    

    <script src="res/js/jquery-3.3.1.js"></script>
    <script src="res/js/popper.js"></script>
    <script src="res/js/bootstrap.js"></script>
    <script src="res/js/ajaxable.min.js"></script>
    <script src="res/js/all.min.js"></script>
    <script src="res/js/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            ajaxable("#formRegis")
            .onStart(function(params) {
                // Make stuff before each request, eg. start 'loading animation'
                // alert("ajax dimulai");
                })
                .onEnd(function(params) {
                })
                .onResponse(function(res, params) {
                // Make stuff after on response of each request
                    // alert("Sukses: "+res);
                    swal.fire("Sukses");
                    console.log("Hello");
                    $("#formRegis").trigger('reset');
                    // $(location).attr('href', 'ajaxable.php');
                    // location.reload();
                })
                .onError(function(err, params) {
                // Make stuff on errors
                    alert("Error: "+res);
            
                });
        });
    </script>
</body>
</html>