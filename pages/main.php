<!-- main -->
    <div class="main">
        <?php
        include('sidebar/sidebar.php');
        ?>
        <div class="maincontent">
            <?php
            if(isset($_GET['quanly'])){
                $tam=$_GET['quanly'];
            }else{
                $tam='';
            }
            if($tam=='danhmucsanpham'){
                include('maincontent/danhmuc.php');
            }elseif($tam=='giohang'){
                include('maincontent/giohang.php');
            }elseif($tam=='danhmucbaiviet'){
                include('maincontent/danhmucbaiviet.php');
            }elseif($tam=='baiviet'){
                include('maincontent/baiviet.php');
            }elseif($tam=='tintuc'){
                include('maincontent/tintuc.php');
            }elseif($tam=='lienhe'){
                include('maincontent/lienhe.php');
            }elseif($tam=='sanpham'){
                include('maincontent/sanpham.php');
            }elseif($tam=='dangky'){
                include('maincontent/dangky.php');
            }elseif($tam=='thanhtoan'){
                include('maincontent/thanhtoan.php');
            }elseif($tam=='dangnhap'){
                include('maincontent/dangnhap.php');
            }elseif($tam=='timkiem'){
                include('maincontent/timkiem.php');
            }elseif($tam=='camon'){
                include('maincontent/camon.php');
            }elseif($tam=='thaydoimatkhau'){
                include('maincontent/thaydoimatkhau.php');
            }else{
                include('maincontent/indexcontent.php');
            }
            ?>
        </div>
    </div>