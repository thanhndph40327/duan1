<?php
// if (is_array($sp)) {
//     extract($sp);
// }
?>
<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Update sản phẩm</h2>
            <div class="list_add_row">
                <form action="index.php?act=update_sanpham&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">

                    <div class="select">
                        <select name="iddm_nho" id="">
                            <option value="<?php
                             foreach ($listdanhmucnho as $danhmuc) {

                                extract($danhmuc);
                                if ($iddm_nho_check == $id) 
                                {
                                    echo $id;
                                    $name_check_dmn = $name;
                                }

                             }?>" selected><?=$name_check_dmn?></option>
                            <?php
                            foreach (array_reverse($listdanhmucnho) as $danhmuc) {
                                extract($danhmuc);
                                if ($iddm_nho_check == $id)
                                {
                                    // pass
                                } else {
                                    if ($iddm_nho == $id) {
                                        $s = "selected";
                                    } else {
                                        $s = "";
                                    }
                                    echo '<option value="' . $id . '" ' . $s . '>' . $name . '</option>';
                                }
                                
                            } ?>

                        </select>
                    </div>

                    <div class="list_add_row_2">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="tensp" value="<?php if (isset($name_sp) && ($name_sp != "")) echo $name_sp ?>" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="anhsp" <?= $img ?>>

                    </div>
                    <div class="list_add_row_2">
                        <label for="">Giá sản phẩm</label>
                        <input type="text" name="giasp" value="<?php if (isset($price) && ($price != "")) echo $price ?>" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Mô tả sản phẩm</label>
                        <textarea name="motasp" id="" cols="30" rows="10"> <?= $mota ?></textarea>

                    </div>
                    <div class="list_add_row_2">
                        <label for="">Mô tả sản phẩm 2</label>
                        <textarea name="motasp2" id="" cols="30" rows="10"> <?= $mota2 ?></textarea>

                    </div>
                    <div class="list_add_row_21">
                        <input type="hidden" name="id" value="<?php if (isset($id) && ($name > 0)) echo $id ?>">
                        <input type="submit" name="capnhat" value="CẬP NHẬT">
                        <input type="reset" value="NHẬP LẠI">
                        <a href="index.php?act=list_sanpham"><input type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php if (isset($thong_bao) && ($thong_bao != ""))
                        echo  "<script language='javascript'>alert('đã thêm thành công');
window.location='index.php?act=list_sanpham';</script>";
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>