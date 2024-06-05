<?php

// Kiểm tra xem giỏ hàng có tồn tại không
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    // Tính tổng giá trị đơn hàng
    $totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng Của Bạn</title>
    <style>
        body {
            background-color: #fff; /* Fix background color */
            color: #000; /* Fix text color */
            font-family: Arial, sans-serif; /* Specify a common font */
            margin: 0;
        }

        h2 {
            border-bottom: 1px solid #444; /* Fix border color */
            font-size: 30px;
            text-align: center;
            padding: 40px;
            background-color: #f8f8f8; /* Add background color */
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: space-around; /* Adjust spacing */
            margin-top: 20px;
            padding: 20px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table2 {
            width: 20%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #000;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #444;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f8f8f8;
            color: #000;
        }

        td {
            background-color: #f8f8f8;
            color: #000;
        }

        strong {
            font-size: 1.2em;
            color: black;
        }

        .total-price {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .checkout-button {
            background: linear-gradient(to right, #1d2b64, #f8cdda);
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .checkout-button:hover {
            background: linear-gradient(to right, #ff6e7f, #bfe9ff);
        }
    </style>
</head>
<body>
    <h2>Giỏ Hàng Của Bạn</h2>

    <div class="container">
        <table  >
            <!-- Table header -->
            <tr>
                <th>Số Thứ Tự</th>
                <th>Sản Phẩm</th>
                <th>Màu Sắc</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
                <th>Chức Năng</th>
            </tr>

            <!-- Table rows -->
            <?php foreach ($cart as $index => $item): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><img width="150px" src="./img/<?=get_img_sanpham($item['id'])[0]['img']?>"/><br><?= $item['name'] ?> </td>
                    <td><?= $item['color'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $item['price'] ?> VNĐ</td>
                    <td><?= $item['quantity'] * $item['price'] ?></td>
                    <td><a href="index.php?act=listCart&xoa=true&arr_key=<?= $index ?>">Xóa</a></td>
                </tr>
                <?php $totalPrice += $item['quantity'] * $item['price']; ?>
            <?php endforeach; ?>
        </table>

        <!-- Summary table -->
        <table class="table2">
            <tr>
                <td colspan="3"><strong>Tổng Giá Trị Đơn Hàng</strong></td>
            </tr>
            <tr>
                <td><strong><?= $totalPrice ?></strong> VNĐ</td>
                <td>
                    <!-- Move the button outside the "td" tag -->
                    <a href="index.php?act=address">
                    <button type="submit" name="order" class="checkout-button">Thanh Toán</button>
                    </a>
                    
                </td>
            </tr>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function proceedToCheckout() {
            window.location.href = './views/checkout.php';
        }
    </script>
</body>
</html>

<?php
} else {
    echo '<script>alert("Giỏ hàng của bạn đang trống. Hãy tiếp tục mua sắm nào!");</script>';
    echo 'Giỏ hàng của bạn đang trống. Hãy tiếp tục mua sắm nào!");</script>';}
?>
