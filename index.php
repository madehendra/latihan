<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/bootstrap.css">
    <link rel="stylesheet" href="res/css/sweetalert2.min.css">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <?php 
        // if ($_POST['username']==='admin' && $_POST['password']==='Admin') {
        //     # code...
        // } else {
        //     header('location:logout.php');
        // }
        ?>
        
        <h1>Selamat datang Administrator</h1>
       
        <form action="logout.php">
            <button type="submit" class="btn btn-danger">Logout 1 (Form)</button>
            <button id="btnLogout" type="button" class="btn btn-info">Logout 2 (Java Script)</button>
            <button id="btnAlert" type="button" onclick="swAlert()" class="btn btn-primary">Logout 3 (Sweet Alert)</button>
        </form>    
    </div>

    
    


    <script src="res/js/jquery-3.3.1.js"></script>
    <script src="res/js/popper.js"></script>
    <script src="res/js/bootstrap.js"></script>
    <script src="res/js/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#btnLogout").click(function () { 

                $(location).attr('href', 'logout.php');
            });
        });
    </script>

    <script>
        function swAlert () {
            Swal.fire({
                    title: 'Yakin akan keluar?',
                    text: "Sampai Jumpa Lagi",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Logout'
                    }).then((result) => {
                    if (result.value) {
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                        $(location).attr('href', 'logout.php');
                    }
            })
        }
    </script>
</body>
</html>