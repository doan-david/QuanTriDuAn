<?php
    include("../../config/connect.php");
    $tendanhmucbaiviet=$_POST['tendanhmucbaiviet'];
    $thutu=$_POST['thutu'];

    if(isset($_POST['themdanhmucbaiviet'])){
        //them
        $sql_them="INSERT INTO tbl_danhmucbaiviet(tendanhmuc_baiviet,thutu) VALUE('".$tendanhmucbaiviet."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
    }
    elseif(isset($_POST['suadanhmucbaiviet'])){
        //sua
        $sql_update="UPDATE tbl_danhmucbaiviet SET tendanhmuc_baiviet='".$tendanhmucbaiviet."',thutu='".$thutu."' WHERE id_danhmucbaiviet='$_GET[iddanhmucbaiviet]'";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
    }else{
        $id=$_GET['iddanhmucbaiviet'];
        $sql_xoa="DELETE FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
    }

?>