
<?php
    require( "connect.php");
    session_start();
        if(isset($_POST["login"])){
        $user_name = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $sql = "select * from tbl_user where user_name = '".$user_name."' and password = '" .$password."'and email ='".$email."'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            $_SESSION["user"]= $data;

            header("location:home_index.php");
        }
        else{
            $error_message = "Bạn đã nhập sai tài khoản, vui lòng nhập lại!";
            echo '<p style="color: red; text-align: center;margin-top: 20px;">' . $error_message . '</p>';
            
        }
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="icon" type="images/x-con" href="../images/icons8-play-48.png">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" >

    </head>
    <body>
        <div id="wrapper">
            <form action="" id="form-login" method="POST">
                <h1  class="form-heading">Đăng nhập</h1>
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input  type="text" name="username" class="form-input" placeholder="Tên đăng nhập" required>
                </div>
                <div class="form-group">
                <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-input" placeholder="Nhập email đăng nhập"required>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" name="password" class="form-input" placeholder="Mật khẩu" required>
                </div>
                
                <input type="submit" name="login" value="Đăng nhập" class="form-submit">
                <br><br>
                <a style="color: #fff; text-decoration: none;" href="#">Quên mật khẩu ?</a>
                <div class="form-fooding">
                    Chưa có tài khoản?
                    <input type="submit" value="Đăng ký" name="register" class="form-submit" onclick="window.location.href='register.php'">  
     
                 </div>
                 <br>
                 <a style="color: #fff; text-decoration: none;" href="home_index.php">QUAY LẠI TRANG CHỦ</a>
            </form>
            
        </div>
        
    </body>
</html>