<h3 style="text-align: center;text-transform:uppercase;">Tin tức mới</h3>
<?php 
    $sql_bv="SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY tbl_baiviet.id_baiviet ASC ";
    $query_bv=mysqli_query($mysqli,$sql_bv);
    
?>
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