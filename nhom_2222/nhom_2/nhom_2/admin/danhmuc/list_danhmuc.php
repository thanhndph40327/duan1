<div class="container">
    <h2>Quản lý danh mục</h2>
    <div class="buttons">

<a href="index.php?act=add_danhmuc"><button class="add-btn">Thêm danh mục</button></a>

</div>
    <table>
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Chức năng</th>
            </tr>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);

                $sua_dm = "index.php?act=sua_dm&id=" . $id;
                $xoa_dm = "index.php?act=xoa_dm&id=" . $id;
                $hinh = "../upload/" . $img;
                if (is_file($hinh)) {
                    $anh = "<img src='" . $hinh . "' height='100' width='100' >";
                } else {
                    $anh = "no photo";
                }
                echo '<tr>
                        <th>' . $id . '</th>
                        <th>' . $anh . '</th>
                        <th>' . $name . '</th>
                        <th>
                            <a href="' . $sua_dm . '"><button class="edit-btn">Sửa</button></a>
                            <a href="' . $xoa_dm . '"><button class="delete-btn">Xóa</button></a> 
                        </th>
                    </tr>';
            }
            ?>
        </thead>
        <tbody>
            <!-- Thông tin sản phẩm sẽ được thêm vào đây -->
        </tbody>
    </table>
  
</div>