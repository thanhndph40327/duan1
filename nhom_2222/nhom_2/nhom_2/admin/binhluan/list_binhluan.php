<div class="container">
    <h2>Danh sách bình luận</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nội Dung</th>
                <th>Nguời bình luận</th>
                <th>Sản phẩm bình luận</th>
                <th>Ngày bình luận</th>
                <th>Chức năng</th>
            </tr>
            <tr>

                <?php
                foreach ($listbinhluan as $bl) {
                    extract($bl);
                    $xoa_bl = "index.php?act=xoa_bl&id=" . $id;
                    echo '<tr>
                            <th>' . $bl['id'] . '</th>
                            <th>' . $bl['noidung'] . '</th>
                            <th>' . $bl['iduser'] . '</th>
                            <th>' . $bl['idpro'] . '</th>                          
                            <th>' . $bl['ngaybinhluan'] . '</th>
                            <th> 
                            <a href="' . $xoa_bl . '"><button class="delete-btn">Xóa</button></a>                      
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