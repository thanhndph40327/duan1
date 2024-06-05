<div class="container">
    <h2>Quản lý danh mục nhỏ</h2>
    <div class="buttons">

        <a href="index.php?act=add_danhmucnho"><button class="add-btn">Thêm danh mục nhỏ</button></a>

    </div>
    <table>
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên</th>
                <th>Chức năng</th>
            </tr>
            <?php
            foreach ($listdanhmucnho as $danhmuc) {
                extract($danhmuc);

                $sua_dmn = "index.php?act=sua_dmn&id=" . $id;
                $xoa_nho = "index.php?act=xoa_nho&id=" . $id;
                echo '<tr>
                        <th>' . $id . '</th>
                        <th>' . $name . '</th>
                        <th>
                            <a href="' . $sua_dmn . '"><button class="edit-btn">Sửa</button></a>
                            <a href="' . $xoa_nho . '"><button class="delete-btn">Xóa</button></a> 
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