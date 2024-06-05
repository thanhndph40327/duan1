<?php

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Don hang cua ban</title>
    <style>

        body {

            background-color: ư; 
            color: #fff; 
        }

        body h2 {
            border-bottom: 1px solid white;
            font-size: 30px;
            text-align: center;
            padding: 40px 40px;
        }

        .container {
            margin-top: 20px;
            padding: 40px 40px;
            display: flex;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table2 {
            margin-left: 100px;
            width: 20%;
            border-collapse: collapse;
            margin-top: 20px;

        }

        th, td {
            border: 1px solid #444; 
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: white; 
            color: black; 
        }

        td {
            background-color: white;
            color: black ;
        }

        strong {
            font-size: 1.2em;
            color: #fc6;
        }
    

    .table2 {
        margin-left: 100px;
        width: 20%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #000;
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        overflow: hidden;
    }

    .table2 td, .table2 th {
        border: 1px solid #444;
        padding: 12px;
        text-align: center;
    }

    .table2 strong {
        font-size: 1.2em;
        color: green;
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
<body id="order" >
<h2>Đơn Hàng</h2>

<div class="container">

    <table id="order" >
        <tr>
            <th>Số Thứ Tự</th>
            <th>Người nhận hàng</th>
            <th>Số điện thoại</th>
            <th>Tên sản phẩm</th>
            <th>Màu sắc</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ</th>
            <th>Ngày mua</th>
            <th>Phương thức thanh toan</th>
            <th>Tình trạng đơn hàng</th>
            <th>Hủy đơn</th>
        </tr>

        <?php 
        foreach ($ttdh as $index => $item): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $item['nguoi_nhan'] ?></td>
                <td ><?= $item['phone_number'] ?> </td>
                <td><?= $item['tensp'] ?></td>
                <td><?= $item['color'] ?></td>
                <td><?= $item['so_luong'] ?></td>
                <td><?= str_replace(',', '.', number_format($item['tong_tien'])) ?></td>
                <td><?= $item['dia_chi'] ?></td>
                <td><?= $item['ngay_mua'] ?></td>
                <td><?= $item['phuong_thuc_thanh_toan'] ?></td>
                <td><?= $item['trang_thai'] ?></td>
                <?php
                if ($item['trang_thai'] == 'Đang chờ gửi hàng' || $item['trang_thai']== 'Đang giao hàng' || $item['trang_thai'] == 'Đã giao')
                {
                    echo '<td>Không thể hủy vì: '.$item['trang_thai'].'</td>';

                } else {
                    echo '<td><a href="index.php?act=thongtindonhang&delete=true&id_del='.$item['id'].'">Hủy đơn</a></td>';
             } ?>
                
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
<script>
function proceedToCheckout() {
    window.location.href = './views/checkout.php';
}
</script>
</body>
</html>


