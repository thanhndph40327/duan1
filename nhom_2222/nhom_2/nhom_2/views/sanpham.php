<div class="container">

    <a href="index.php?act=iphone">
        <div class="headinh">
            <h1><?= $ten_dm ?></h1>
        </div>
    </a>
    <div class="box_san_pham">
        <?php
        foreach ($ddsp as $sanpham) {
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
                <div class="price">' . $price . ' VNĐ' . '</div>
            </a>
        </div>';
        }
        ?>

    </div>


</div>