<?php 
    session_start();
    include('config/connect.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan=$_POST['username'];
        $matkhau=md5($_POST['password']);
        $sql="SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
        $row=mysqli_query($mysqli,$sql);
        $count=mysqli_num_rows($row);
        if($count>0){
            $_SESSION['dangnhap']=$taikhoan;
            header("Location:index.php");
        }else{
            echo '<script>alert("tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại");</script>';
            header("Location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Admincp</title>
</head>
<body>
    <div class="wrapper_login" >
        <form action="" method="POST" autocomplete="off">
            
        
            <table border="1" class="table_login">
                <tr>
                    <td colspan="2"><h3>Đăng nhập admin</h3></td>
                </tr>
                <tr>
                    <td>Tài khoản</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                </tr>
            </table>
        </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>