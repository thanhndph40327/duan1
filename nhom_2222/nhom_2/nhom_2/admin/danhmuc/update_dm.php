<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Update danh mục</h2>
            <div class="list_add_row">
                <form action="index.php?act=update_dm" method="POST" enctype="multipart/form-data">
                    <!-- <div class="list_add_row_2">
                        <label for="">Mã danh mục</label>
                        <input type="text" name="maloai" placeholder="Nhập mã danh mục">
                    </div> -->
                    <div class="list_add_row_2">
                        <label for="">Ảnh danh mục</label>
                        <input type="file" name="anhdm" id="">
                        <?= $anh_dm ?>
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name ?>" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="list_add_row_21">
                        <input type="hidden" name="id" value="<?php if (isset($id) && ($name > 0)) echo $id ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=list_danhmuc"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php if (isset($thong_bao) && ($thong_bao != ""))
                        echo  "<script language='javascript'>alert('đã thêm thành công');
                                window.location='index.php?act=list_danhmuc';</script>";
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>