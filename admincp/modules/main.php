<div class="clear"> </div>
<div class="main">
<?php
            if(isset($_GET['action']) && $_GET['query']){
                $tam=$_GET['action'];
                $query=$_GET['query'];
            }else{
                $tam='';
                $query='';                
            }
            if($tam=='quanlydanhmucsanpham' && $query=='them'){
                include('modules/qldanhmucsp/them.php');
                include('modules/qldanhmucsp/lietke.php');

            }elseif($tam=='quanlydanhmucsanpham' && $query=='sua'){
                include('modules/qldanhmucsp/sua.php');

            }elseif($tam=='quanlysanpham' && $query=='them'){
                include('modules/qlsanpham/them.php');
                include('modules/qlsanpham/lietke.php');

            }elseif($tam=='quanlysanpham' && $query=='sua'){
                include('modules/qlsanpham/sua.php');

            }elseif($tam=='quanlydonhang' && $query=='lietke'){
                include('modules/qldonhang/lietke.php');
            }elseif($tam=='donhang' && $query=='xemdonhang'){
                include('modules/qldonhang/xemdonhang.php');

            }elseif($tam=='quanlydanhmucbaiviet' && $query=='them'){
                include('modules/qldanhmucbaiviet/them.php');
                include('modules/qldanhmucbaiviet/lietke.php');
            }elseif($tam=='quanlydanhmucbaiviet' && $query=='sua'){
                include('modules/qldanhmucbaiviet/sua.php');

            }elseif($tam=='quanlybaiviet' && $query=='them'){
                include('modules/qlbaiviet/them.php');
                include('modules/qlbaiviet/lietke.php');
            }elseif($tam=='quanlybaiviet' && $query=='sua'){
                include('modules/qlbaiviet/sua.php');

            }elseif($tam=='quanlyweb' && $query=='capnhat'){
                include('modules/thongtinweb/quanly.php');

            }elseif($tam=='thongke' && $query=='capnhat'){
                include('modules/thongke/thongke.php');

            }else{
                include('modules/dashboard.php');
            }
            ?>
</div>