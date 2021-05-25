<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/bootstrap.css">
    <title>Login</title>
</head>
<body>
    
    <div class="container">
        
        <?php 
            if ( isset($_POST['username'])  &&  !empty($_POST['username']) ) {
        
                $con = mysqli_connect("localhost","root","","latihan");
                $sql = "select * from tbluser where email='" . $_POST['username'] . "'";    
                $res = mysqli_query($con,$sql);
                if (mysqli_num_rows($res)>0) {
                    $row = mysqli_fetch_array($res);
                    if ($_POST['password']==$row['passw']) {
                        // data cocok silahkan login
                        header('location:index.php');
                    }
                }
            } 
            
        ?>

        <h1>Silahkan Login</h1>
        <form name="frmLogin" action=" <?php  $_SERVER['PHP_SELF'];  ?> " method="post">
            <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="eMail /Username">
            </div>
            <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
            </div>
            <div>
                <button type="submit" name="btnLogin"    id="btnLogin"    class="btn btn-outline-info">Login</button>
                <button type="button" name="btnRegister" id="btnRegister" class="btn btn-outline-primary">Register</button>
            </div>
        </form>
    </div>
    <script src="res/js/jquery-3.3.1.js"></script>
    <script src="res/js/popper.js"></script>
    <script src="res/js/bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $("#btnRegister").click(function () { 
                $(location).attr('href', 'register.php');
            });
        });
    </script>
</body>
</html>