<?php 
    if(isset($_POST['doimatkhau'])){
        $taikhoan=$_POST['email'];
        $matkhau_cu=md5($_POST['password_cu']);
        $matkhau_moi=md5($_POST['password_moi']);
        $sql="SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row=mysqli_query($mysqli,$sql);
        $count=mysqli_num_rows($row);
        if($count>0){
            $sql_update=mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
            echo '<p style="color:green">chúc mừng bạn đã thay đổi mật khẩu thành công</p>';
        }else{
            echo '<p style="color:red">tài khoản hoặc mật khẩu cũ không chính xác, vui lòng nhập lại</p>';
        }
    }
?>
<p>Đổi mật khẩu</p>
<form action="" method="POST" autocomplete="off">
            
        
            <table border="1" class="table_login">
                <tr>
                    <td colspan="2"><h3>Đổi mật khẩu khách hàng</h3></td>
                </tr>
                <tr>
                    <td>Tài khoản</td>
                    <td><input type="text" name="email" value=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu cũ</td>
                    <td><input type="text" name="password_cu" value=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu mới</td>
                    <td><input type="text" name="password_moi" value=""></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
                </tr>
            </table>
        </form>