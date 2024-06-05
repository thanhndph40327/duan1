<div class="product-container">
    <div class="product-images">
        <?php
        
        $img = $img_path . $img;
        echo '<img src="' . $img . '">';
        ?>
    </div>
    <div class="product-details">
        <?php extract($spct) ?>
        <h1><?= $name ?></h1>
        <p class="product-price"><?= $price ?> VND</p>
        <p class="product-description">
            <?= $mota ?>
        </p>
        
        <div class="product-options">
            <label for="color">Màu sắc:</label>
            <select id="color" name="color">
                <option value="Đen">Đen</option>
                <option value="Trắng">Trắng</option>
            </select>
        </div>
        <div class="product-quantity">
            <label for="quantity">Số lượng:</label>
            <button id="increaseBtn" onclick="decreaseQuantity()">+</button>
            <input type="number" id="quantity" value="1" min="1">
            <button id="increaseBtn" onclick="increaseQuantity()">+</button>
        </div>
        <div class="button_buy">
            <button data-id="<?= $id ?>" id="addToCartBtn"  >Thêm vào giỏ hàng</button>
            <button id="add">Mua ngay!</button>
        </div>
        <br>
        <!-- <p class="product-description_2">
            - Bảo hành lên đến 2 năm, đổi trả trong vòng 7 ngày ! <br>- Giao hàng nhanh toàn quốc !


        </p> -->

    </div>
    
</div>
<div class="product-text">
    <h2> Mô tả</h2>
    <?php
    echo '<p>' . $mota . '</p>';
    ?>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>

 
<script>
    let totalProduct =document.getElementById('totalProduct');
    
    $('#addToCartBtn').click(function(e)
    {
        
        let quantityInput = $('#quantity').val();
        let colorInput = $('#color').val();
        // addToCart(<?= $id ?>, '<?= $name?>', <?= $price ?>, );
        
        $.ajax({
            type: "POST",
            url: './views/addToCart.php',
            data:{
                id: '<?= $id ?>',
                name: '<?= $name?>',
                price:  '<?= $price ?>',
                color: colorInput,
                quantity: quantityInput
            }
        }).done(function(response)
        {
            totalProduct.innerText = response;
                alert('Bạn đã thêm vào giỏ hàng thành công');
        }).fail(function(errr)
        {
            console.log(errr); 
        });
    });


    $('#add').click(function(e)
    {
        
        let quantityInput = $('#quantity').val();
        let colorInput = $('#color').val();
        // addToCart(<?= $id ?>, '<?= $name?>', <?= $price ?>, );
        
        $.ajax({
            type: "POST",
            url: './views/muangay.php',
            data:{
                id: '<?= $id ?>',
                name: '<?= $name?>',
                price:  '<?= $price ?>',
                color: colorInput,
                quantity: quantityInput
            }
        }).done(function(response)
        {
            totalProduct.innerText = response;
               window.location.href = "index.php?act=address";
        }).fail(function(errr)
        {
            console.log(errr); 
        });
    });


    
 
     function increaseQuantity() {
        let quantityInput = document.getElementById('quantity');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }
    function decreaseQuantity() {
        let quantityInput = document.getElementById('quantity');
        if (parseInt(quantityInput.value) == 1)
        {
            return;
        }
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
</script>
        <script>
            $(document).ready(function() {
              $("#binhluan").load("views/binhluan/binhluanform.php", {idpro: <?php  echo     $id ?>});
            });
        </script>
        <div class="row " id="binhluan">
            
        </div>

</div>
<div class="container">
<a href="index.php?act=mac">
        <div class="headinh">
            <h1></i>Sản phẩm cùng loại</h1>
        </div>
    </a>    
   

<div class="box_san_pham">
<?php
foreach($cung_loai as $loai){
    extract($loai);
    $link_sp = "index.php?act=san_pham_ct&idsp=" . $id;
    $hinh = $img_path . $img;
    echo'<a href="'.$link_sp.'"><div class="san_pham">
    <div class="img">
        <img src="'.$hinh.'" alt="">
    </div>
    <div class="title">
        <h2>'.$name.'</h2>
    </div>
    <div class="price">'.$price.' VND</div>
    </div></a>';

}
?>

</div>
</div>