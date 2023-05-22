<p>Giỏ hàng</p>
<?php 
    if(isset($_SESSION['dangky'])){
        echo 'Xin chào: '.'<span style="color:green">'.$_SESSION['dangky'].'</span>'.' ';
        echo $_SESSION['id_khachhang'];
    }
?>
<?php 
    if(isset($_SESSION['cart'])){
    }
?>
<table style="width:100%;text-align:center;border-collapse:collapse;" border="1">
  <tr>
    <th>Id</th>
    <th>mã sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>giá sản phẩm</th>
    <th>Thành tiền</th>
    <th>Quản lý</th>
  </tr>
    <?php
        if(isset($_SESSION['cart'])){
            $i=0;
            $tongtien=0;
            foreach ($_SESSION['cart'] as $cart_item){
                $thanhtien=$cart_item['soluong']*$cart_item['giasp'];//tính giá nhân số lượng
                $tongtien+=$thanhtien;
                $i++;
    ?>

  <tr>
    <td> <?php echo $i; ?></td>
    <td> <?php echo $cart_item['masp'];?></td>
    <td> <img width="150px" src="admincp/modules/qlsanpham/uploads/<?php echo $cart_item['hinhanh']?>"></td>
    <td> <?php echo $cart_item['tensanpham'];?></td>
    <td> 
        <a href="pages/maincontent/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa-solid fa-square-plus"></i></a>
        <?php echo $cart_item['soluong'];?>
        <a href="pages/maincontent/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa-solid fa-square-minus"></i></a>
    </td>
    <td> <?php echo number_format($cart_item['giasp'],0,',','.').'vnđ';?></i></td>
    <td> <?php echo number_format($thanhtien,0,',','.').'vnđ'?></td>
    <td><a href="pages/maincontent/themgiohang.php?xoa=<?php echo $cart_item['id']?>"><i class="fa-solid fa-trash-can"></a></td>
  </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="8">
            <p style="float:left;"> Tổng tiền:<?php echo number_format($tongtien,0,',','.').'vnđ'?></p><br>
            <p style="float:right;"><a href="pages/maincontent/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
            <div style="clear:both">
                <?php
                    if(isset($_SESSION['dangky'])){
                ?>
                    <p><a href="pages/maincontent/thanhtoan.php">Đặt hàng</a></p>
                <?php
                    }else{
                ?>
                    <p><a href="index.php?quanly=dangky">Đăng ký và đặt hàng</a></p>
                <?php
                    }
                ?>
            </div>
        </td>
    </tr>
    <?php
    }else{
    ?>
    <tr>
        <td colspan="8"><p> Hiện tại giỏ hàng trống</p></td>
    </tr>
    <?php
        }
    ?>

</table>