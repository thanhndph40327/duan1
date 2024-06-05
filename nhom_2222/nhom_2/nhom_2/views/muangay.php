<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productColor = $_POST['color'];
    $solong = $_POST['quantity'];
    
    // Kiểm tra xem 'cart' đã được khởi tạo hay chưa
    // if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    // }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $index = array_search($productId, array_column($_SESSION['cart'], 'id'));
    

    if ($index !== false) {
        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
        $_SESSION['cart'][$index]['quantity'] ++;
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
        $product = array(
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'color' => $productColor,
            'quantity' => $solong
        );
        $_SESSION['cart'][] = $product;
    }

    echo count($_SESSION['cart']);
} else {
    echo '';
}
?>


