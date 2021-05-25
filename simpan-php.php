<?php
    session_start();
    //Require the class
    require('formkey.class.php');
    //Start the class
    $formKey = new formKey();

    $error = 'No error';


    //Is request?
    if($_SERVER['REQUEST_METHOD'] == 'post')
    {
        //Validate the form key
        echo $_POST['form_key'];
        die();
        if(!isset($_POST['form_key']) || !$formKey->validate())
        {
            //Form key is invalid, show an error
            $error = 'Form key error!';
        }
        else
        {
            //Do the rest of your validation here
            $error = 'No form key error!';
        }
    }

    include "db/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="res/css/bootstrap.css">
    <!-- Sweet Alert2 -->
    <link rel="stylesheet" href="res/css/sweetalert2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="res/css/all.min.css">

    <!-- jQuery -->
    <script src="res/js/jquery-3.3.1.js"></script>  
    <!-- Popper -->
    <script src="res/js/popper.js"></script>
    <!-- Bootstrap -->
    <script src="res/js/bootstrap.js"></script>
    <!-- Ajaxablejs.org -->
    <script src="res/js/ajaxable.min.js"></script>
    <!-- Font Awesome -->
    <script src="res/js/all.min.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="res/js/sweetalert2.all.min.js"></script>
    <!--  https://igorescobar.github.io/jQuery-Mask-Plugin/ -->
    <script src="res/js/jquery.mask.js"></script>

    <title>Form Registrasi</title>
</head>
<body>


    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Form Registrasi Alamat Mahasiswa</a>
        </nav>
        <br>
        
        <div><?php if($error) { echo($error); } ?></div>

        <form id="formRegis" name="formRegis" action=" <?php $_SERVER['PHP_SELF']; ?> " method="post">
            <?php $formKey->outputKey(); ?>
            <div class="form-group">              
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">              
            </div>
            <div class="form-group">              
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" >              
            </div>
            <div class="form-group">              
              <input type="number" name="umur" id="umur" class="form-control" placeholder="Umur (Th)">              
            </div>
            <div class="form-group">           
              <input type="date" name="tgl" id="tanggal" class="form-control" placeholder="Tgl Lahir">              
            </div>

            <div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Kirim</button>                
            </div>
        </form>
    </div>

    <?php 
        if (isset($_POST['nama']) && !empty($_POST['nama'])  ) {
            $sql  ="insert into anggota (nama,alamat,umur,tgl) values (?,?,?,?)";
            $con = $db->prepare($sql);
            $con->bind_param('ssss',$_POST['nama'],$_POST['alamat'],$_POST['umur'],$_POST['tgl']);
            $con->execute();   
            $res = $con->get_result(); 

            echo "" . 
            "<script  type='text/javascript'>
                swal.fire('Sukses: Data berhasil disimpan');
            </script>";

        }     
    ?>
    
    <!-- Menggunakan Model 1 # $_SERVER['PHP_SELF'] -->
    <div class="container">
    <?php 
        $sql = "select * from anggota";
        $res = $db->prepare($sql);
        $res->execute();
        $con = $res->get_result();
        if ($con->num_rows>0 ) {
            while ($row = $con->fetch_assoc()) {
                echo $row['nama'] . " " . $row['alamat'] . '<br>';
            }
        }        
     ?>    
    </div>

</body>
</html>