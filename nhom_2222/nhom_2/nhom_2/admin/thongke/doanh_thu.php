
<div class="container">
    <h2>THỐNG KÊ DOANH THU</h2>
    <table>
        <thead>
        <tr>
                <th>ID Sản Phẩm</th>  
                <th>Tên Sản Phẩm</th>   
                <th>Số Lượng</th>                           
                <th>Tổng Tiền</th>               
            </tr>
            <?php
            $tong_tien_tat_ca = 0; 
            $tong_soluong_tat_ca = 0; 
            foreach($doanhthu as $dt){
                extract($dt);
                echo '<tr>
                    <td>'.$idsp.'</td>
                    <td>'.$tensp.'</td>
                    <td>'.$total_quantity.'</td>
                    <td>'.$total_revenue.'</td>
                </tr>';
                $tong_tien_tat_ca += $total_revenue; 
                $tong_soluong_tat_ca += $total_quantity;
            }
            ?>
            <tr style="background-color:#4caf50;" >
                <td colspan="3"><strong>Tổng Số Lượng Tất Cả</strong></td>
                <td style=" text-decoration:underline;  font-size: 25px; " ><?=$tong_soluong_tat_ca?> Sản Phẩm Đã Bán</td>
            </tr>
            <tr style="background-color:#4caf50;" >
                <td colspan="3"><strong>Tổng Doanh Thu Tất Cả</strong></td>
                <td style=" text-decoration:underline;  font-size: 25px; " ><?=$tong_tien_tat_ca?> VNĐ</td>
            </tr>
        </thead>
        <tbody>
            <!-- Thông tin sản phẩm sẽ được thêm vào đây -->
        </tbody>
    </table>
    <div class="buttons">
    <a href="index.php?act=bieu_do_doanh_thu">><button class="add-btn">Xem biểu đồ</button></a>
    <a href="index.php?act=thong_ke1"><button class="add-btn">Xem biểu đồ doanh thu theo tháng</button></a>

    </div>
</div>
