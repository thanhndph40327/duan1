<div class="container">
    <h2>Danh sách tài khoản</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Vai Trò</th>
                <th>SĐT</th>
                <th>Chức năng</th>
            </tr>
            <tr>

                <?php
                foreach ($listtaikhoan as $tk) {
                    extract($tk);
                    $xoa_tk = "index.php?act=xoa_tk&id=" . $id;
                    $phan_quyen = "index.php?act=sua_vt&id=" . $id;
                    echo '<tr>
                            <th>' . $tk['id'] . '</th>
                            <th>' . $tk['username'] . '</th>
                            <th>' . $tk['email'] . '</th>                          
                            <th>' . $tk['role'] . '</th>
                            <th>' . $tk['tel'] . '</th>
                            <th> 
                            <a href="' . $xoa_tk . '"><button class="delete-btn">Xóa</button></a> 
                            <a href="' . $phan_quyen . '"><button name="capnhat" class="delete-btn">Phân quyền</button></a>                     
                            </th>
                        </tr>'; 
                }
                ?>
            </tr>

        </thead>
        <tbody>
        </tbody>
    </table>
</div>