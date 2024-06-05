<div class="container">
    <h2>Quản lý Sản phẩm</h2>
    <form action="index.php?act=list_sanpham" method="POST">
        <input type="text" name="kyw" class="input">
        <select name="iddm_nho" id="">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmucnho as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="go" value="OK" class="input1">
    </form>
    <div class="buttons">

<a href="index.php?act=add_sanpham"><button class="add-btn">Thêm sản phẩm</button></a>

</div>
    <table>
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Mô tả 2</th>
                <th>Lượt xem</th>
                <th>Chức năng</th>
            </tr>
            <tr>

                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $sua_sp = "index.php?act=sua_sp&id=" . $id;
                    $xoa_sp = "index.php?act=xoa_sp&id=" . $id;
                    $hinh = "../upload/" . $img;
                    if (is_file($hinh)) {
                        $anh = "<img src='" . $hinh . "' height='100' width='100' >";
                    } else {
                        $anh = "no photo";
                    }
                    echo '<tr>
                            <th>' . $sanpham['id'] . '</th>
                            <th>' . $anh . '</th>
                            <th>' . $sanpham['name'] . '</th>
                            <th>' . $sanpham['price'] . '</th>
                            <th>' . $sanpham['mota'] . '</th>
                            <th>' . $sanpham['mota'] . '</th>                          
                            <th>' . $sanpham['view'] . '</th>
                            <th> 
                            <a href="' . $sua_sp . '"><button class="edit-btn">Sửa</button></a>
                            <a href="' . $xoa_sp . '"><button class="delete-btn">Xóa</button></a>
                                
                                
                            </th>
                        </tr>';
                }
                ?>
            </tr>

        </thead>
        <tbody>
            <!-- Thông tin sản phẩm sẽ được thêm vào đây -->
        </tbody>
    </table>
  
</div>