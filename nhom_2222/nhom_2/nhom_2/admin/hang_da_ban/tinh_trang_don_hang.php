<?php
if (is_array($dh)) {
    extract($dh);
}
?>
<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Cập nhật tình trạng đơn hàng</h2>
            <div class="list_add_row">
                <form action="index.php?act=tinh_trang_don_hang" method="POST" enctype="multipart/form-data">
                <div class="list_add_row_2">
                        <label for="">Tên người nhận hàng</label>
                        <input type="text" name="ten_nguoi_nhan" value="<?php if (isset($nguoi_nhan) && ($nguoi_nhan != "")) echo $nguoi_nhan ?>" placeholder="Tên người nhận hàng">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="tensp" value="<?php if (isset($tensp) && ($tensp != "")) echo $tensp ?>" >
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Tình trang đơn hàng</label>
                        <select name="tinh_trang" id="">
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Đang chờ gửi hàng">Đang chờ gửi hàng</option>
                            <option value="Đang giao hàng">Đang giao hàng</option>
                            <option value="Đã giao">Đã giao </option>
                        </select>
                        <!-- <input type="text" name="tinh_trang" value="<?php if (isset($trang_thai) && ($trang_thai != "")) echo $trang_thai ?>" placeholder="Tình trang đơn hàng"> -->
                    </div>
                    <div class="list_add_row_21">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=hang_da_ban"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php if (isset($thong_bao) && ($thong_bao != ""))
                        echo  "<script language='javascript'>alert('đã thêm thành công');
                                window.location='index.php?act=hang_da_ban';</script>";
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>