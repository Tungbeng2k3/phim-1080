
    <?php
    require("connect.php");
    if(isset($_POST["register"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $re_password=$_POST["re_password"];
        $email=$_POST["email"];
        if($password!=$re_password){
            $error_password = "Mật khẩu không giống nhau, đề nghị nhập lại!";
            echo '<p style="color: red; text-align: center;margin-top: 20px;">' . $error_password . '</p>'; 
        }
        elseif(strlen($password) < 5)  { 
                $error_kitu = "Mật khẩu phải có ít nhất 5 ký tự!";  
                echo '<p style="color: red; text-align: center;margin-top: 20px;">' . $error_kitu . '</p>';
            }
        
        else {
            $sql = "SELECT * FROM tbl_user WHERE user_name='".$username."'";
            $result = mysqli_query($conn, $sql);
        
            if (mysqli_num_rows($result) > 0) {
                $error_username = "Tên đăng nhập đã tồn tại, đề nghị nhập tên đăng nhập khác!";
                echo '<p style="color: red; text-align: center; margin-top: 20px">' . $error_username . '</p>';
            } 
            else {
                $sqll = "SELECT * FROM tbl_user WHERE email='".$email."'";
                $resultt = mysqli_query($conn, $sqll);
        
                if (mysqli_num_rows($resultt) > 0) {
                    $error_email = "Email đã tồn tại, đề nghị nhập email khác!";
                    echo '<p style="color: red; text-align: center; margin-top: 20px">' . $error_email . '</p>';
                } 
                else {
                    $sql_insert = "INSERT INTO tbl_user(user_name, password, email) VALUES ('".$username."','".$password."','".$email."')";
        
                    if(mysqli_query($conn, $sql_insert)){
                        header("location: login.php");
                    } 
                    else {
                        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                    }
                }
            }
        }
        
    }
    if(isset($_POST["login"])){
        header("location:login.php");
    }
?>


<html>
    <head>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/register.css">
        <link rel="icon" type="images/x-con" href="../images/icons8-play-48.png">
        <title>Đăng ký</title>
    </head>
    <body>
        <div id="wrapper">
            <form action="" id="form-login" method="POST">
                <h1  class="form-heading">Đăng ký</h1>
                <div class="form-group">
                    <input  type="text" name="username" class="form-input" placeholder="Tên đăng nhập" required >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-input" placeholder="Mật khẩu" required>
                </div>
                <div class="form-group">
                    <input type="password" name="re_password" class="form-input" placeholder="Nhập lại mật khẩu"required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-input" placeholder="Nhập email của bạn"required>
                </div>
                <input type="submit" value="Đăng ký" name="register" class="form-submit" onclick="">  
                <div class="form-fooding">
                    Đã có tài khoản?
                    <input type="submit" onclick="window.location.href='login.php'" class="form-submit" name="login" value="Đăng nhập" ;">
                   
                 </div>
            </form>
            
        </div>
        
    </body>
</html>