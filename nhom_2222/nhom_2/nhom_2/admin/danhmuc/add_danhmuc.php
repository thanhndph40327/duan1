<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Thêm danh mục</h2>
            <div class="list_add_row">
                <form action="index.php?act=add_danhmuc" method="POST" enctype="multipart/form-data">
                    <!-- <div class="list_add_row_2">
                        <label for="">Mã danh mục</label>
                        <input type="text" name="maloai" placeholder="Nhập mã danh mục">
                    </div> -->
                    <div class="list_add_row_2">
                        <label for="">Ảnh danh mục</label>
                        <input type="file" name="anhdm" id="">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="tenloai" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="list_add_row_21">
                        <input type="submit" name="themmoi" value="THÊM MỚI">
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