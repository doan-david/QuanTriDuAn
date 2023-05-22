<?php
    include('../../config/connect.php');
    if(isset($_GET['cart_status'])&& isset($_GET['code'])){
        $status=$_GET['cart_status'];
        $code=$_GET['code'];
        $sql=mysqli_query($mysqli,"UPDATE tbl_cart SET cart_status=0 WHERE code_cart='".$code."'");
        header('Location:../../index.php?action=quanlydonhang&query=lietke');
    }

?>