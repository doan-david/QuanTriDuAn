<?php
    include("../../config/connect.php");
    $tenbaiviet=$_POST['tenbaiviet'];
    //xuly hinh anh
    $hinhanh=$_FILES['hinhanh']['name'];
    $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
    $hinhanh=time().'_'.$hinhanh;

    $tomtat=$_POST['tomtat'];
    $noidung=$_POST['noidung'];
    $tinhtrang=$_POST['tinhtrang'];
    $danhmuc=$_POST['danhmuc'];
    
    if(isset($_POST['thembaiviet'])){
        //them
        $sql_them="INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,id_danhmucbaiviet,tinhtrang,hinhanh) VALUE('".$tenbaiviet."','".$tomtat."','".$noidung."','".$danhmuc."','".$tinhtrang."','".$hinhanh."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    }
    elseif(isset($_POST['suabaiviet'])){
        //sua
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql_update="UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',tomtat='".$tomtat."',noidung='".$noidung."',id_danhmucbaiviet='".$danhmuc."',tinhtrang='".$tinhtrang."',hinhanh='".$hinhanh."' WHERE id_baiviet='$_GET[idbaiviet]'";
            //xoa hinh anh cu
            $id=$_GET['idbaiviet'];
            $sql="SELECT * FROM tbl_baiviet WHERE id_baiviet='$id' LIMIT 1";
            $query=mysqli_query($mysqli,$sql);
            while($row=mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }else{
            $sql_update="UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',tomtat='".$tomtat."',noidung='".$noidung."',id_danhmucbaiviet='".$danhmuc."',tinhtrang='".$tinhtrang."' WHERE id_baiviet='$_GET[idbaiviet]'";
        }
        mysqli_query($mysqli,$sql_update);
        
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    }
    else{
        $id=$_GET['idbaiviet'];
        $sql="SELECT * FROM tbl_baiviet WHERE id_baiviet='$id' LIMIT 1";
        $query=mysqli_query($mysqli,$sql);
        while($row=mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa="DELETE FROM tbl_baiviet WHERE id_baiviet='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    }

?>