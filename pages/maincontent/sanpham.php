<h1> Chi tiết sản phẩm</h1>
<?php
    $sql_chitiet="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet=mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet=mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">

<div class="hinhanh_sanpham">
    <img width="100%" src="admincp/modules/qlsanpham/uploads/<?php echo $row_chitiet['hinhanh']?>">
</div>

<form method="POST" action="pages/maincontent/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
<div class="chitiet_sanpham">
    <h3 style="margin:0;">Tên sản phẩm: <?php echo $row_chitiet['tensanpham']?></h3>
    <p>Mã sản phẩm: <?php echo $row_chitiet['masp']?></p>
    <p>Giá sản phẩm: <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnđ'?></p>
    <p>Số lượng: <?php echo $row_chitiet['soluong']?></p>
    <p>Danh mục: <?php echo $row_chitiet['tendanhmuc']?></p>
    <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
</div>
</form>

</div>
<div class="clear">
    <div class="tabs_sp">
    <h3 style="margin: 20px; padding-top: 20px;">Thông tin chi tiết sản phẩm</h3>
    <div class="title_ctsp"><h5 >Tóm tắt</h5><br>
    <?php echo $row_chitiet['tomtat']?></div>
    <div class="title_ctsp"><h5>Nội dung</h5><br>
    <?php echo $row_chitiet['noidung']?></div>
    </div>
</div>
<?php
}
?>