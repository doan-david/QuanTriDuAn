<p>quản lý thông tin website</p>
<?php
    $sql_lh="SELECT * FROM tbl_lienhe WHERE id_lienhe=1";
    $query_lh=mysqli_query($mysqli,$sql_lh);
    
?>
<table border="1"; width="100%" style="border-collapse:collapse">
<?php 
    while($dong=mysqli_fetch_array($query_lh)){ 
?>
<form method="POST" action="modules/thongtinweb/xuly.php?id=<?php echo $dong['id_lienhe']?>" enctype="multipart/form-data">  
<tr>
    <tr>
    <td>Thông tin liên hệ</td>
    <td><textarea row="10" name="thongtinlienhe" style="resize:none"><?php echo $dong['thongtinlienhe']?></textarea></td>
  </tr>
  <tr>
    <td colspan=2><input type="submit" name="submitlienhe" value="cập nhật"></td>
  </tr>
</form>
<?php 
    } 
?>
</table>
