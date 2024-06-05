<div class="container">
    <div class="list_add_1">
        <div class="list_add">
            <h2>Thêm sản phẩm</h2>
            <div class="list_add_row">
                <form name="addProductForm" action="index.php?act=add_sanpham" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

                    <div class="select">
                        <select name="iddm_nho" id="">
                            <option value="0">Tất cả</option>
                            <?php
                            foreach ($listdanhmucnho as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="tensp" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="anhsp">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Giá sản phẩm</label>
                        <input type="text" name="giasp" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Mô tả sản phẩm</label>
                        <textarea name="motasp" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="list_add_row_2">
                        <label for="">Mô tả sản phẩm 2</label>
                        <textarea name="motasp2" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="list_add_row_21">
                        <input type="submit" name="themmoi" value="THÊM MỚI">
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
<script>
    function validateForm() {
        var iddm_nho = document.forms["addProductForm"]["iddm_nho"].value;
        var tensp = document.forms["addProductForm"]["tensp"].value;
        var anhsp = document.forms["addProductForm"]["anhsp"].value;
        var giasp = document.forms["addProductForm"]["giasp"].value;
        var motasp = document.forms["addProductForm"]["motasp"].value;

        if (iddm_nho == "0" || tensp.trim() === "" || anhsp.trim() === "" || giasp.trim() === "" || motasp.trim() === "") {
            alert("Vui lòng điền đầy đủ thông tin sản phẩm");
            return false;
        }
        return true;
    }
</script>