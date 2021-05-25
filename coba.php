<?php 
require "db/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="res/css/bootstrap.css">
    <link rel="stylesheet" href="res/css/sweetalert2.min.css">
    <link rel="stylesheet" href="res/css/datatables.css">
    <link rel="stylesheet" href="res/css/all.min.css">
</head>
<body>

    <div class="container">
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link" href="#">Home</a>
        </div>
    </nav>
    <?php 
    $sql = "select * from tbluser";
    $con = $db->prepare($sql);
    $con->execute();
    $res = $query->get_result();
    if ($res->num_rows>0) {
        # code...
        while ($row = $res->fetch_assoc()) {
            # code...
            extract($row);
            echo "{$email}<br>";
        }
    }

    ?>
    </div>


    <script src="res/js/jquery-3.3.1.js"></script>
    <script src="res/js/popper.js"></script>
    <script src="res/js/bootstrap.js"></script>
    <script src="res/js/sweetalert2.all.min.js"></script>
    <script src="res/js/datatables.js"></script>
    <script src="res/js/all.min.js"></script>
</body>
</html>