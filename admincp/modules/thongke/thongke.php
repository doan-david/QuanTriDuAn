<p>Thống kê doanh thu</p>
<?php
    require('../../../carbon/autoload.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now=Carbon::now('Asia/Ho_Chi_Minh');
    $sql_thongke="SELECT * FROM tbl_thongke ORDER BY ngaydat ASC";
    $query_thongke=mysqli_query($mysqli,$sql_thongke);
?>
<table style="width:100%" border="1" style="border-collapse:collapse;">
  <tr>
    <th>Id</th>
    <th>Ngày đặt</th>
    <th>Đơn hàng</th>
    <th>Doanh thu</th>
    <th>Số lượng bán</th>
  </tr>
  <?php
    $i = 0;
    while($row=mysqli_fetch_array($query_thongke)){
      $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['id_thongke'] ?></td>
    <td><?php echo $row['ngaydat'] ?></td>
    <td><?php echo $row['donhang'] ?></td>
    <td><?php echo $row['doanhthu'] ?></td>
    <td><?php echo $row['soluongban'] ?></td>
    <tr>
    
  </tr>
  <?php
  }
  ?>
  <td colspan=5><input type="submit" name="submitthongke" value="cập nhật"></td>
</table>