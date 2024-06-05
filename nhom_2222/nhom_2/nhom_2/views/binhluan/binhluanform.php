<?php
   session_start();
   include "../../model/pdo.php";
   include "../../model/binh_luan.php";
   
   $idpro=$_REQUEST['idpro'];

   $dsbl=loadall_binh_luan($idpro);
  //  die(var_dump($dsbl));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
  .product-reviews {
    max-width: 800px; /* Adjust the width according to your design */
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.comment-input {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.product-reviews h2 {
    font-size: 24px;
    margin-bottom: 15px;
}

.boxcontent2 {
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

/* Add additional styles as needed */

 </style>
</head>
<body>
    



  <div class="product-reviews">
    <h2>Bình luận sản phẩm</h2><p>*kéo xuống dưới để xem bình luận</p>
    <div class="comment-input">
    <label for="comment">Viết bình luận:</label>  
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
      <input type="hidden" name="idpro" value="<?=$idpro?>">
      <input type="text" name="noidung" id="" required>
      <input type="submit" name="guibinhluan" id="" value="Gửi">
      <div class="product-reviews">
  <h2>Danh Sách Bình Luận</h2> 
  <div class="boxcontent2 binhluan2">
    <ul>
      <table>
      <?php
      foreach ($dsbl as $bl) {
        extract($bl);
        
        echo '<tr><td>' .$username. '</td>';
        echo '<td>' .$noidung. '</td>';
        // echo '<td>' .$iduser. '</td>';
        
        echo '<td>' .$ngaybinhluan. '</td></tr>';
        
            
       }
      ?>
      </table>
    </ul>
  </div>
</div>
    </form>
    </div>
  </div>

  <?php
     if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){
      $noidung = $_POST['noidung'];
      $idpro = $_POST['idpro'];
      $iduser = $_SESSION['iduser'];
     
      $ngaybinhluan = date('h:i:sa d/m/y');
      insert_binh_luan($noidung, $iduser, $idpro, $ngaybinhluan, $_SESSION['username']); 
      header("location:" .$_SERVER['HTTP_REFERER']);
    }

  ?>


</body>
</html>