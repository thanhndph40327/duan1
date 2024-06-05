<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php?act=home"><img src="./img/Olive Green Pink Modern Minimalist Company Logo (1).png" alt=""></a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?act=iphone">iPhone</a></li>
                <li><a href="index.php?act=mac">Mac</a></li>
                <li><a href="index.php?act=watch">Watch</a></li>
                <li><a href="index.php?act=phu_kien">Phụ kiện</a></li>
            </ul>
        </nav>
        <div class="header_right">
        <div class="search">
                <form action="index.php?act=sanpham" method="POST">
                    <input type="text" name="kyw" placeholder="Tìm kiếm từ khóa">
                    <div class="search_icon">
                        <button type="submit" name="timkiem" class="tk">
                            <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
         
            <div class="cart">
               <a href="index.php?act=listCart"> <i class="fa-solid fa-cart-shopping"></i></a>
               <span id="totalProduct"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>               
            </div>


            <div class="login">
                <i class="fa-solid fa-user"></i>
                <ul>
                    <?php
                    // session_start();
                    if (isset($_SESSION["username"])) {
                        $name = $_SESSION['username'];
                        $role = $_SESSION['role'];
                    ?>
                    <h2><?= $name ?></h2>
                    <?php if ($role == 1) { ?>
                    <li><a href="admin/index.php">Đăng nhập admin</a></li>
                    <?php } ?>
                    <li><a href="index.php?act=thongtindonhang">Đơn hàng của bạn</a></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                    <?php
                    } else {
                    ?>
                    <li><a href="index.php?act=dang_nhap">Đăng nhập</a></li>
                    <li><a href="index.php?act=dang_ky">Đăng ký</a></li>

                    <?php } ?>
                </ul>
            </div>


            
           
        </div>
    </header>