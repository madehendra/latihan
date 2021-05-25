<?php 
    define("HOSTNAME","localhost");
    define("USERID","root");
    define("DBNAME","latihan");
    $db = new mysqli(HOSTNAME,USERID,"",DBNAME);
    if ($db->connect_error) {
        die("Koneksi ke server gagal..");
    }
?>