<?php
    $sql_sua_danhmucbv="SELECT * FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet='$_GET[iddanhmucbaiviet]' LIMIT 1";
    $query_sua_danhmucbv=mysqli_query($mysqli,$sql_sua_danhmucbv);
?>
<p> Sửa danh mục bài viết</p>
<table border="1"; width="50%" style="border-collapse:collapse">
<form method="POST" action="modules/qldanhmucbaiviet/xuly.php?iddanhmucbaiviet=<?php echo $_GET['iddanhmucbaiviet']?>">
<?php
        while($dong=mysqli_fetch_array($query_sua_danhmucbv)){
?>
<tr>
    <td>Tên danh mục</td>
    <td><input type="text" value="<?php echo $dong['tendanhmuc_baiviet']?>" name="tendanhmucbaiviet"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
  </tr>
  <tr>
    <td colspan=2><input type="submit" name="suadanhmucbaiviet" value="Cập nhật danh mục bài viết"></td>
  </tr>
  <?php 
    } ?>
</form>
</table>