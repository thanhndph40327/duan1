<div class="container">
    <h2>Đơn Hàng</h2>
    <table>
        <thead>
            <tr>
                <th>Số Thứ Tự</th>
                <th>Người nhận hàng</th>
                <th>Số điện thoại</th>
                <th>Tên sản phẩm</th>
                <th>Màu sắc</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Địa chỉ</th>
                <th>Ngày mua</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>

            </tr>

            <?php
            foreach ($donhang as $dh) {
                extract($dh);
                $sua_dh = "index.php?act=sua_dh&id=" . $id;
                $xoa_dh = "index.php?act=xoa_dh&id=" . $id;
                echo '
        <tr>
        <th>' . $dh['id'] . '</th>
        <th>' . $dh['nguoi_nhan'] . '</th>
        <th>' . $dh['phone_number'] . '</th>
        <th>' . $dh['tensp'] . '</th>
        <th>' . $dh['color'] . '</th>
        <th>' . $dh['so_luong'] . '</th>
        <th>' . $dh['tong_tien'] . '</th>
        <th>' . $dh['dia_chi'] . '</th>
        <th>' . $dh['ngay_mua'] . '</th>
        <th>' . $dh['phuong_thuc_thanh_toan'] . '</th>
        <th>' . $dh['trang_thai'] . '</th>
        <th>
                <a href="' . $sua_dh . '"><button class="edit-btn">Sửa</button></a>
                <a href="' . $xoa_dh . '"><button class="delete-btn">Xóa</button></a> 
        </th>
        </tr>';
            }
            ?>
        </thead>
        <tbody>
            <!-- Thông tin sản phẩm sẽ được thêm vào đây -->
        </tbody>
    </table>
    <!-- <div class="buttons">

        <a href="index.php?act=add_danhmucnho"><button class="add-btn">Thêm danh mục nhỏ</button></a>

    </div> -->
</div>