<?php
if (!isset($_SESSION['username']))
{
    echo '<script>alert("Bạn chưa đăng nhập");window.location.href = "index.php?act=dang_nhap";</script>';
}
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
    <title>Thanh toán</title>
    <!-- Thêm vào phần đầu của HTML của bạn -->
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }
h1{
    text-align: center;
    margin: 20px;
}
        label {
            margin-bottom: 5px;
        }

        input,
        select {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: linear-gradient(to right, #1d2b64, #f8cdda);
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #ff6e7f, #bfe9ff);
        }


table {
    margin-left: 230px;
    width: 70%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ccc;
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


.summary h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.summary table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.summary th, .summary td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: center;
}

.summary th {
    background-color: #f8f8f8;
    color: #000;
}

.summary td {
    background-color: #f8f8f8;
    color: #000;
}

    </style>
</head>


<body id="order">
 <!-- Sản phẩm đã đặt -->
            
            <!-- Thông tin tóm tắt -->
            
<div class="container">
<h1>Thanh Toán</h1>
    <form action="" method="post">
        <label>Tên người nhận:</label>
        <input type="text" name="tennguoinhan" placeholder="Tên" required /><br>

        <label>Số điện thoại nhận hàng:</label>
        <input type="text" name="phone" placeholder="SDT" required /><br>

        <label>Chọn tỉnh:</label>
        <select name="tinh">
            <?php
            $list = json_decode(file_get_contents('https://provinces.open-api.vn/api/?depth=2'));
            foreach ($list as $location) {
                echo '<option value="' . $location->name . '">' . $location->name . ' </option>';
            }
            ?>
        </select>
        <br>

        <label>Địa chỉ nhận hàng:</label>
        <input type="text" name="diachi" placeholder="Thôn/ khối Phố - Xã/Phường - Quận/huyện" required /><br>
        <label>Chọn phương thức thanh toán:</label>
<select name="phuong_thuc" id="payment-method">
    <option value="tien_mat">Tiền mặt</option>
    <option value="chuyen_khoan">Qr Code</option>
    <option value="chuyen"><button class="btn btn-danger" type="submit">MoMo</button></option>

</select>
<!-- Text hướng dẫn -->
<p id="qr-code-help" style="display: none;">* Quét mã QR để thanh toán (Sau 24h không thanh toán, đơn hàng sẽ bị hủy)</p>

<!-- Container cho mã QR -->
<div id="qr-code-container" style="display: none;"><img width="150px" src="https://ddamhieu.id.vn/img/1701960970839.png" alt="Qr code" />
<p>Chuyển khoản ghi nội dung: <b style="color:red"><?=$_SESSION['username']?> thanhtoandonhang </b></p></div>
        <!-- Help Text -->
        
        <p> * Vui lòng nhập thông tin chính xác để chúng tôi có thể gửi hàng đến địa chỉ của bạn một cách chính xác nhất.</p>

        <button type="submit" name="xacnhan">Xác nhận đơn hàng</button>
    </form>
</div>
<table>
                <tr>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Màu Sắc</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>

                <?php foreach ($cart as $index => $item): ?>
                    <tr>
                        <td><img width="100px" src="./img/<?=get_img_sanpham($item['id'])[0]['img']?>"/><br><?= $item['name'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= $item['color'] ?></td>
                        <td><?= $item['price'] ?> VNĐ</td>
                        <td><?= $item['quantity'] * $item['price'] ?></td>
                    </tr>
                    <?php $totalPrice += $item['quantity'] * $item['price']; ?>
                <?php endforeach; ?>
                <div class="summary">
                <table>
                    <tr>
                        <th>Tổng giá trị đơn hàng</th>
                        <td><?= $totalPrice ?> VNĐ</td>
                    </tr>
                </table>
            </div>
            </table>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function proceedToCheckout() {
        window.location.href = './views/checkout.php';
    }
    $(document).ready(function() {
        // Bắt sự kiện thay đổi của dropdown phương thức thanh toán
        $('#payment-method').change(function() {
            var selectedMethod = $(this).val();

            // Ẩn/hiện container và text hướng dẫn mã QR dựa trên phương thức được chọn
            if (selectedMethod === 'chuyen_khoan') {
                $('#qr-code-help').show();
                $('#qr-code-container').show();

            } else {
                $('#qr-code-help').hide();
                $('#qr-code-container').hide();
            }
        });

        // Hàm tạo mã QR
        function generateQRCode(data) {
            var qrcode = new QRCode(document.getElementById("qr-code-container"), {
                text: data,
                width: 128,
                height: 128
            });
        }
    });
</script>
</body>
</html>

<?php
} else {
    echo "Giỏ hàng của bạn đang trống.";
}
?>
