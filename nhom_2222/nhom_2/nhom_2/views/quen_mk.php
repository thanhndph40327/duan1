<div class="container">
    <div class="box_form">
        <div class="box">
            <?
               
            ?>
            <form action="index.php?act=quen_mk" method="post">
                <h1>Quên mật khẩu</h1>
                <div class="box_one">
                    <input type="email" name="email" placeholder="Nhập email">
                    <span></span>
                </div>
                
              
               
                <button type="submit" class="dk" name="guiemail"> Gửi </button>

         <input type="reset" class="dk" value="Nhập lại">
      <br>
      <?php if (isset($sendMailMess) && $sendMailMess != '') {
            echo $sendMailMess;
      } ?>
            </form>
            <h2 class="thongbao" >
            <?php 
                  if(isset($thongbao) && ($thongbao!="")){
                    echo $thongbao;
                  }         
            ?>
        </h2>
        </div>
    </div>
</div>
