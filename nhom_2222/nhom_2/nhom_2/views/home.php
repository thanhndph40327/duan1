
<div class="banner_index">
    <img src="./img/anh0.jpg" id="banner" alt=""  >
    <div class="banner_bnt">
    </div>
</div>
<div class="container">

    <div class="box_danh_muc">
            <div class="danh_muc">
                <a href="index.php?act=iphone">
                <div class="danh_muc_one">
                    <img src="img/IP_Desktop.webp" alt="">
                    <div class="dm_headinh">Iphone</div>
                </div>
                </a>
                <a href="index.php?act=mac">
                <div class="danh_muc_one">
                    <img src="img/Mac_Desktop.webp" alt="">
                    <div class="dm_headinh">Mac</div>
                </div>
                </a>
                <a href="index.php?act=watch">
                <div class="danh_muc_one">
                    <img src="img/Watch_Desktop.webp" alt="">
                    <div class="dm_headinh">Watch</div>
                </div>
                </a>
                <a href="index.php?act=phu_kien">
                <div class="danh_muc_one">
                    <img src="img/PK_Desktop.webp" alt="">
                    <div class="dm_headinh">Phụ kiện</div>
                </div>
                </a>
            </div>

        </div>

        <a href="index.php?act=sanpham">
        <div class="headinh">
            <h1></i>Sản phẩm bán chạy</h1>
        </div>
    </a>
    <div class="box_san_pham">

        <?php foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=san_pham_ct&idsp=" . $id;
                $img = $img_path . $img;
                echo '<div class="san_pham">
                <a href="' . $linksp . '">
                        <div class="img">
                            <img src="' . $img . '" alt="">
                        </div>
                        <div class="title">
                            <h2>' . $name . '</h2>
                        </div>
                        <div class="price">' . str_replace(',', '.', number_format($price))  . ' VNĐ' . '</div>
                    </a>
                    </div>';
                    
            }
            ?>

    </div

    <a href="index.php?act=iphone">
        <div class="headinh">
            <h1><i class="fa-brands fa-apple"></i>Iphone</h1>
        </div>
    </a>
    <div class="box_san_pham">
        <?php
        foreach ($san_pham_iphone as $sanpham) {
            extract($sanpham);
            $hinh = $img_path . $img;
            $link_sp = "index.php?act=san_pham_ct&idsp=" . $id;
            echo '<div class="san_pham">
            <a href="' . $link_sp . '">
                <div class="img">
                    <img src="' . $hinh . '" alt="">
                </div>
                <div class="title">
                    <h2>' . $name . '</h2>
                </div>
                <div class="price">' . str_replace(',', '.', number_format($price)) . ' VNĐ' . '</div>
            </a>
        </div>';
        }
        ?>

    </div>

    <a href="index.php?act=mac">
        <div class="headinh">
            <h1><i class="fa-brands fa-apple"></i>Mac</h1>
        </div>
    </a>
    <div class="box_san_pham">
        <?php
        foreach ($san_pham_mac as $sanpham) {
            extract($sanpham);
            $hinh = $img_path . $img;
            $link_sp = "index.php?act=san_pham_ct&idsp=" . $id;
            echo '<div class="san_pham">
            <a href="' . $link_sp . '">
                <div class="img">
                    <img src="' . $hinh . '" alt="">
                </div>
                <div class="title">
                    <h2>' . $name . '</h2>
                </div>
                <div class="price">' . str_replace(',', '.', number_format($price)) . ' VNĐ' . '</div>
            </a>
        </div>';
        }
        ?>
    </div>


    <a href="index.php?act=watch">
        <div class="headinh">
            <h1><i class="fa-brands fa-apple"></i>Watch</h1>
        </div>
    </a>
    <div class="box_san_pham">

        <?php
        foreach ($san_pham_watch as $sanpham) {
            extract($sanpham);
            $hinh = $img_path . $img;
            $link_sp = "index.php?act=san_pham_ct&idsp=" . $id;
            echo '<div class="san_pham">
            <a href="' . $link_sp . '">
                <div class="img">
                    <img src="' . $hinh . '" alt="">
                </div>
                <div class="title">
                    <h2>' . $name . '</h2>
                </div>
                <div class="price">' . str_replace(',', '.', number_format($price)) . ' VNĐ' . '</div>
            </a>
        </div>';
        }
        ?>
    </div>

    <a href="index.php?act=phu_kien">
        <div class="headinh">
            <h1>Phụ kiện</h1>
        </div>
    </a>
    <div class="box_san_pham">

        <?php
        foreach ($san_pham_phukien as $sanpham) {
            extract($sanpham);
            $hinh = $img_path . $img;
            $link_sp = "index.php?act=san_pham_ct&idsp=" . $id;
            echo '<div class="san_pham">
            <a href="' . $link_sp . '">
                <div class="img">
                    <img src="' . $hinh . '" alt="">
                </div>
                <div class="title">
                    <h2>' . $name . '</h2>
                </div>
                <div class="price">' . str_replace(',', '.', number_format($price)) . ' VNĐ' . '</div>
            </a>
        </div>';
        }
        ?>
    </div>

</div>

