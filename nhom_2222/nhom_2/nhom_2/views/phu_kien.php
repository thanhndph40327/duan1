<div class="container">
    <div class="headinh">
        <h1>Phụ kiện</h1>
    </div>
    <div class="banner">
        <img src="img/Phu-kien-2400-600-1920x480.webp" alt="">
    </div>
    <main>

        <div class="products">
            <div class="list">
                <ul>
                    <li><a href="#">Tất cả</a></li>
                    <?php
                    foreach ($danh_muc_nho_phukien as $dm) {
                        extract($dm);
                        $link = "index.php?act=sanpham&iddm_nho=" . $id;
                        echo '<li><a href="' . $link . '">' . $name . '</a></li>';
                    }
                    ?>;
                </ul>
                <div class="loc">
                    
                </div>

            </div>
            <div class="box_products">
                <?php
                foreach ($ddsp as $sanpham) {
                    extract($sanpham);
                    $hinh = $img_path . $img;
                    $link_sp = "index.php?act=san_pham_ct&idsp=" . $id;
                    echo '<a href="' . $link_sp . '">
                            <div class="list_products">
                                <div class="thumb">
                                    <img src="' . $hinh . '" alt="">
                                </div>
                                <div class="title">
                                    <h2>' . $name . '</h2>
                                </div>
                                <div class="price">' . $price . ' VNĐ' . '</div>
                            </div>
                        </a> ';
                }
                ?>


            </div>
    </main>
</div>