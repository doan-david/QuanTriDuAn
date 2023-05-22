<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang=$_POST['hovaten'];
        $email=$_POST['email'];
        $dienthoai=$_POST['dienthoai'];
        $diachi=$_POST['diachi'];
        $matkhau=md5($_POST['matkhau']);
        $sql_dangky=mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo'<p style="color:green">Bạn đã đăng ký thành công</p>';
            $_SESSION['dangky']=$tenkhachhang;
            $_SESSION['email']=$email;
            
            $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);
            header('Location:index.php?quanly=giohang');
        }
    }
?>
<p>Đăng ký thành viên</p>
<form action="" method="POST">
    <table class="dangky" border="1">
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" size="50" name="hovaten" value=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="50" name="email" value=""></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" size="50" name="dienthoai" value=""></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="50" name="diachi" value=""></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" size="50" name="matkhau" value=""></td>
        </tr>
        <tr>
            <td><input style type="submit" name="dangky" value="Đăng ký"></td>
            <td> <a href="index.php?quanly=dangnhap"> Đăng nhập nếu bạn đã có tài khoản</a></td>
        </tr>
    </table>
</form>