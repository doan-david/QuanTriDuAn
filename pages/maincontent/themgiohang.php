<?php 
    session_start();
    include('../../admincp/config/connect.php');
    //them so luong
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){//so sánh thẻ id vs id của tất cả sản phẩm nếu khác nhau thì thêm sp khác vào mảng product và lập lại sesion
                
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart']=$product;
            }else{//nếu giống thì thục hiện việc cong
                $tangsoluong=$cart_item['soluong']+1;
                if($cart_item['soluong']<=9){//nếu số lượng nhỏ hơn 10 thì tăng lên 1
                    
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }else{//nếu số lượng lớn hơn 10 thì ngưng
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);

                }
                //thiết lập lại session
                $_SESSION['cart']=$product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //tru so luong
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){//so sánh thẻ id vs id của tất cả sản phẩm nếu khác nhau thì thêm sp khác vào mảng product và lập lại sesion
                
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                $_SESSION['cart']=$product;
            }else{//nếu giống thì thục hiện việc trừ
                $giamsoluong=$cart_item['soluong']-1;
                if($cart_item['soluong']>=1){//nếu số lượng nhỏ hơn 10 thì tăng lên 1
                    
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$giamsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                }else{//nếu số lượng lớn hơn 10 thì ngưng
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);

                }
                //thiết lập lại session
                $_SESSION['cart']=$product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //xoa san pham
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){//so sánh thẻ id vs id của tất cả sản phẩm nếu khác nhau thì thêm sp đó vào mảng product còn giống thì k cho vào
                
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);

            }
        //tạo lại session mới dựa theo product ở trên sau khi lọc thẻ id giống vs id của sản phẩm
        $_SESSION['cart']=$product;
        header('Location:../../index.php?quanly=giohang');
        }
    }

    //xao tat ca
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }

    //them san pham vao gio hang
    if(isset($_POST['themgiohang'])){
        // session_destroy();
        $id=$_GET['idsanpham'];
        $soluong=1;
        $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
        $query=mysqli_query($mysqli,$sql);
        $row=mysqli_fetch_array($query);
        if($row){
            $new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
            //kiem tra session gio hang tontai chua
            if(isset($_SESSION['cart'])){
                $found=false;
                foreach($_SESSION['cart'] as $cart_item){
                    //neu du lieu trung
                    if($cart_item['id']==$id){
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                        $found=true;
                    }else{
                        //neu du lieu khong trung
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);

                    }
                }
                //lien ket du lieu new product voi product
                $_SESSION['cart'] = ($found==false) ? array_merge($product,$new_product) : $product;//toan tu hang 3 (condition) ? (value_if_true) : (value_if_false)
            }else{
                $_SESSION['cart']=$new_product;
            }
        }
        
        header('Location:../../index.php?quanly=giohang');
    }
?>