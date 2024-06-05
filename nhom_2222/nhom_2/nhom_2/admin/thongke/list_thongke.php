
<div class="container">
<h2>THỐNG KÊ SẢN PHẨM THEO DANH MỤC</h2>
    <table>
        <thead>
        <tr>
                <th>Mã DANH MỤC</th>
                <th>TÊN DANH MỤC</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>
            <?php
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
        </thead>
        <tbody>
            <!-- Thông tin sản phẩm sẽ được thêm vào đây -->
        </tbody>
    </table>
    <div class="buttons">

    <a href="index.php?act=bieu_do"><button class="add-btn">Xem biểu đồ</button></a>

    </div>
</div>