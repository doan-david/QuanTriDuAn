
<div class="sidebar">
    <h4 style="text-align: center;">Danh mục sản phẩm</h4>
    <ul class="list_sidebar">
    <?Php
        $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC ";
        $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
        while($row=mysqli_fetch_array($query_danhmuc)){

    ?>
        <li style="text-transform:uppercase"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>"><?php echo $row['tendanhmuc']?></a></li>
    <?php 
        }
    ?>
    </ul>
    <h4 style="text-align: center;">Danh mục bài viết</h4>
    <ul class="list_sidebar">
    <?Php
        $sql_danhmucbv="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet ASC ";
        $query_danhmucbv=mysqli_query($mysqli,$sql_danhmucbv);
        while($row=mysqli_fetch_array($query_danhmucbv)){

    ?>
        <li style="text-transform:uppercase"><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_danhmucbaiviet']?>"><?php echo $row['tendanhmuc_baiviet']?></a></li>
    <?php 
        }
    ?>
    </ul>
</div>