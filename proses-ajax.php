<?php 
    if (isset($_POST['nama']) && !empty($_POST['nama'])) {
        include "db/koneksi.php";
        $sql  ="insert into anggota (nama,alamat,umur,tgl) values (?,?,?,?)";
        $con = $db->prepare($sql);
        $con->bind_param('ssss',$_POST['nama'],$_POST['alamat'],$_POST['umur'],$_POST['tgl']);
        $con->execute();
        if ($con) {
            echo json_encode("200");
        } else {
            echo json_encode("400");
        }
    }else{
        echo json_encode("600");
    }
?>