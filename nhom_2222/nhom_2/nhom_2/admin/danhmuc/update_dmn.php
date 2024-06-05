<?php

if (is_array($dmn)) {
    extract($dmn);
}
?>
<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Update danh mục nhỏ</h2>
            <div class="list_add_row">
                <form action="index.php?act=update_dmn" method="POST">
                    <div class="select">
                        <select name="iddm_nho" id="">
                            <option value="0" selected>Tất cả</option>
                            <?php
                            foreach ($listdanhmucnho as $find_id_dmn) {
                                extract($find_id_dmn);
                                if ($id == $_GET['id']) {
                                    $name_dmn = $name;
                                }
                            }
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                // var_dump($danhmuc);
                                // die;
                                // if ($iddm_nho == $id) {
                                //     $s = "selected";
                                // } else {
                                $s = "";
                                echo '<option value="' . $id . '" ' . $s . '>' . $name . '</option>';
                                // }
                            } ?>

                        </select>
                    </div>
                    <!-- <div class="list_add_row_2">
                            <label for="">Mã danh mục</label>
                            <input type="text" name="maloai" placeholder="Nhập mã danh mục">
                        </div> -->
                    <div class="list_add_row_2">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="tendmn" value="<?= $name_dmn ?>" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="list_add_row_21">
                        <input type="hidden" name="idd" value="<?php if (isset($id) && ($name > 0)) echo $id ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="NHẬP LẠI">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                        <a href="index.php?act=list_danhmucnho"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php if (isset($thong_bao) && ($thong_bao != ""))
                        echo  "<script language='javascript'>alert('đã thêm thành công');
                                window.location='index.php?act=list_danhmucnho';</script>";
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>