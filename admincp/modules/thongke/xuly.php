<?php
    include("../../config/connect.php");
    $thongtinlienhe=$_POST['thongtinlienhe'];
    $id=$_GET['id'];

    if(isset($_POST['submitthongke'])){
        //sua
        //$sql_update="UPDATE tbl_thongke SET thongtinlienhe='".$thongtinlienhe."' WHERE id_lienhe='$id'";
        //mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=thongke&query=capnhat');
    }
?>