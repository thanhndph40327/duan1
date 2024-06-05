<div class="container">
    <!-- index.html -->
<!-- <div class="box">
    
</div> -->



<div class="box">
        <div class="box1">
            <a href="index.php?act=list_sanpham">
                <div class="box2">
                    <h1>Sản phẩm</h1>
                    <h1><?=count($listsanpham)?></h1>
                </div>
            </a>
        </div>
       
        <div class="box1">
            <a href="index.php?act=list_danhmuc">
            <div class="box2">
                <h1>Danh mục</h1>
                <h1><?=count($listdanhmuc)?></h1>
            </div>
            </a>  
        </div>
    </div>
    <div class="box">
        <div class="box1">
            <a href="index.php?act=list_danhmucnho">
            <div class="box2">
                <h1>Danh mục nhỏ</h1>
                <h1><?=count($listdanhmucnho)?></h1>
            </div>
            </a>
        </div>
        <div class="box1">
            <a href="index.php?act=list_binhluan">
            <div class="box2">
                <h1>Bình luận</h1>
                <h1><?=count($listbinhluan)?></h1>
            </div>
            </a>
        </div>
    </div>
    <div class="box">
        <div class="box1">
            <a href="index.php?act=list_taikhoan">
            <div class="box2">
                <h1>Tài khoản</h1>
                <h1><?=count($listtaikhoan)?></h1>
            </div>
            </a>
            
        </div>
        <div class="box1">
        <a href="index.php?act=hang_da_ban">
        <div class="box2">
                <h1>Đơn hàng</h1>
                <h1><?=count($donhang)?></h1>
            </div>
        </a>
            
        </div>
    </div>

    <div class="dnk">
        <div class="row2">
        <div class="row">
    <div class="row frmtitle">
        <h1>THỐNG KÊ DANH MỤC</h1>
    </div>
    <div class="row m10 frmdsloai">
        <table>
            <tr>
                <th>Mã DANH MỤC</th>
                <th>TÊN DANH MỤC</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>
            <?php
             $listthongke = loadall_thongke();
              foreach($listthongke as $tk){
                extract($tk);
                echo '<tr>
                <td>'.$madm.'</td>
                <td>'.$tendm.'</td>
                <td>'.$countsp.'</td>
                <td>'.$maxprice.'</td>
                <td>'.$minprice.'</td>
                <td>'.$avgprice.'</td>
             </tr>';
              }
            ?>
        </table>
    </div>
    <div class="row">
    <div class="row frmtitle">
        <h1> DOANH THU</h1>
    </div>
    <div class="row m10 frmdsloai">
        <table>
           
            <?php
            $doanhthu = loadall_doanhthu();
            $tong_tien_tat_ca = 0; 
            $tong_soluong_tat_ca = 0; 
            foreach($doanhthu as $dt){
                extract($dt);
               
                $tong_tien_tat_ca += $total_revenue; 
                $tong_soluong_tat_ca += $total_quantity;
            }
            ?>
             <tr  >
                <td colspan="3"><strong>Tổng Số Lượng Tất Cả</strong></td>
                <td style=" text-decoration:underline;  font-size: 25px; " ><?=$tong_soluong_tat_ca?> Sản Phẩm Đã Bán</td>
            </tr>
            <tr  >
                <td colspan="3"><strong>Tổng Doanh Thu Tất Cả</strong></td>
                <td style=" text-decoration:underline;  font-size: 25px; " ><?=$tong_tien_tat_ca?> VNĐ</td>
            </tr>
           
        </table>
    </div>
    <div class="row mb10">
    </div>
</div>

</div>

    </div>
    </div>


</div>
<script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            console.log(this.responseText); // In ra nội dung phản hồi
            if (this.status == 200) {
                var data = JSON.parse(this.responseText);
                document.getElementById("total_danhmucnho").innerHTML = data.total_danhmucnho;
            }
        }
    };
    xhttp.open("GET", "danhmuc/list_danhmucnho.php", true);
    xhttp.send();
</script>