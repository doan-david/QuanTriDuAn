<?php 
    $sql_bv="SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_baiviet='$_GET[id]' LIMIT 1";
    $query_bv=mysqli_query($mysqli,$sql_bv);

    $query_bv_all=mysqli_query($mysqli,$sql_bv);

    $row_title=mysqli_fetch_array($query_bv);
    
?>
<h3>Bài viết:<span style="text-align: center;text-transform:uppercase;"><?php echo $row_title['tenbaiviet']?></span></h3>
<ul class="baiviet">
    <?php
    while($row_bv=mysqli_fetch_array($query_bv_all)){
    ?>
    <li>
        <h1 style="text-align:center; color: #20784d"><?php echo $row_bv['tenbaiviet']?></h1>
        <!-- <img src="admincp/modules/qlbaiviet/uploads/<?php echo $row_bv['hinhanh']?>"> -->
        
        <p>Tóm tắt:<?php echo $row_bv['tomtat']?></p>
        <p>Nội dung:<?php echo $row_bv['noidung']?></p>

    </li>
    <?php
    }
    ?>
</ul>