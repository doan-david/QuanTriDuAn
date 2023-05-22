<?php
    $sql_sua_bv="SELECT * FROM tbl_baiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
    $query_sua_bv=mysqli_query($mysqli,$sql_sua_bv);
?>
<p> Sửa bài viết</p>
<table border="1"; width="100%" style="border-collapse:collapse">
<?php
  while($row=mysqli_fetch_array($query_sua_bv)){
?>
<form method="POST" action="modules/qlbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet']?>"  enctype="multipart/form-data">  
<tr>
    <td>Tên bài viết</td>
    <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" value="<?php echo $row['hinhanh'] ?>" name="hinhanh">
        <img src="modules/qlbaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="30%"height="100px">
  </td>
  </tr>
  <tr>
    <td>Tóm tắt</td>
    <td><textarea row="10" name="tomtat" style="resize:none"> <?php echo $row['tomtat'] ?></textarea></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><textarea row="10" name="noidung" style="resize:none"> <?php echo $row['noidung'] ?></textarea></td>
  </tr>
  <tr>
    <td>Danh mục bài viết</td>
    <td>
        <select name="danhmuc">
          <?Php
            $sql_danhmuc="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet ASC ";
            $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
              if($row_danhmuc['id_danhmucbaiviet']==$row['id_danhmucbaiviet']){
          ?>
          <option selected value="<?php echo $row_danhmuc['id_danhmucbaiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
            <?php
              }else{
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmucbaiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
            <?php
              }
            ?>
          <?php 
          }
          ?>
        </select>
    </td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td>
        <select name="tinhtrang">
          <?php 
          if ($row['tinhtrang']==1) {
          ?>
          <option value="1" selected>kích hoạt</option>
          <option value="0">ẩn</option>
          <?php
          }
          else{
          ?>
          <option value="1">kích hoạt</option>
          <option value="0" selected>ẩn</option>
          <?php
          }
          ?>
        </select>
    </td>
  </tr>
  <tr>
    <td colspan=2><input type="submit" name="suabaiviet" value="sửa bài viết"></td>
  </tr>
</form>
<?php }?>
</form>
</table>