<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Thêm danh mục nhỏ</h2>
            <div class="list_add_row">
                <form action="index.php?act=add_danhmucnho" method="POST">
                    <div class="select">
                        <select name="iddm_nho" id="">
                            <option value="0">Tất cả</option>
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                        <!-- <div class="list_add_row_2">
                            <label for="">Mã danh mục</label>
                            <input type="text" name="maloai" placeholder="Nhập mã danh mục">
                        </div> -->
                        <div class="list_add_row_2">
                            <label for="">Tên danh mục</label>
                            <input type="text" name="tendmn" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="list_add_row_21">
                            <input type="submit" name="themmoi" value="THÊM MỚI">
                            <input type="reset" value="NHẬP LẠI">
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