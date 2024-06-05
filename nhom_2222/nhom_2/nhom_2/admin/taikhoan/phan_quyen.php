<?php

if (is_array($vt)) {
    extract($vt);
}
?>
<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Phần quyền</h2>
            <div class="list_add_row">
                <form action="index.php?act=phan_quyen" method="POST">
                    <!-- <div class="list_add_row_2">
                            <label for="">Mã danh mục</label>
                            <input type="text" name="maloai" placeholder="Nhập mã danh mục">
                        </div> -->
                    <div class="list_add_row_2">
                        <label for="">Tên người dùng</label>
                        <input type="text" name="ten" placeholder="Nhập tên người dùng"
                            value="<?php if (isset($username) && ($username != "")) echo $username ?>">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Vai trò</label>
                        <input type="number" name="role" placeholder="Nhập vai trò (1-admin ; 0-người dùng)">
                    </div>
                    <div class=" list_add_row_21">
                        <input type="hidden" name="id" value="<?php if (isset($id) && ($name > 0)) echo $id ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=list_taikhoan"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php if (isset($thong_bao) && ($thong_bao != ""))
                        echo  "<script language='javascript'>alert('Cập nhật thành công');
                                window.location='index.php?act=list_taikhoan';</script>";
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>