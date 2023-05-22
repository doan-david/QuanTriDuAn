
<?php 
    
    $sql_bv="SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmucbaiviet='$_GET[id]' ORDER BY tbl_baiviet.id_baiviet ASC ";
    $query_bv=mysqli_query($mysqli,$sql_bv);
    //get ten danh muc
    $sql_cate="SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_danhmucbaiviet='$_GET[id]' LIMIT 1";
    $query_cate=mysqli_query($mysqli,$sql_cate);
    $row_title=mysqli_fetch_array($query_cate);
    
?>
            <h3>Danh mục bài viết:<span style="text-align: center;text-transform:uppercase;"><?php echo $row_title['tendanhmuc_baiviet']?></span></h3>
            <ul class="list_baiviet">
                <?php
                while($row_bv=mysqli_fetch_array($query_bv)){
                ?>
                <li>
                    <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id_baiviet']?>">
                    <img src="admincp/modules/qlbaiviet/uploads/<?php echo $row_bv['hinhanh']?>">
                    <p style="word-wrap: break-word;" class="title_product">Tên bài viết: <?php echo $row_bv['tenbaiviet']?></p>
                    </a>
                    <p class="title_product">Tóm tắt:<?php echo $row_bv['tomtat']?></p>
                </li>
                <?php
                }
                ?>
            </ul>