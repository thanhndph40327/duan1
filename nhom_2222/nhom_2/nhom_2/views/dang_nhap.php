<!-- <div class="container">
    <div class="box_form">
        <div class="box">
            <?
               
            ?>
            <form action="index.php?act=dang_nhap" method="post">
                <h1>Đăng nhập</h1>
                <div class="box_one">
                    <input type="text" name="username" placeholder="Tên tài khoản" required>
                    <span></span>
                </div>
                
                <div class="box_one">
                    <input type="password" name="password" placeholder="Mật khẩu" required>
                    <span></span>
                </div>
               
                <button type="submit" class="dk" name="dang_nhap">Đăng nhập</button>
                <div class="singup_link">
                    <p>Bạn chưa có tài khoản? <a href="index.php?act=dang_ky">Đăng ký tại đây</a></p>
                    <p><a href="index.php?act=quen_mk"> Quên mật khẩu ?</a></p>
                </div>
            </form>
            <h2 class="thongbao">
            <?php 
                  if(isset($thongbao) && ($thongbao!="")){
                    echo $thongbao;
                  }         
            ?>
        </h2>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="box_form">
        <div class="box">
            <form action="index.php?act=dang_nhap" method="post" onsubmit="return validateForm()">
                <h1>Đăng nhập</h1>
                <div class="box_one">
                    <input type="text" name="username" placeholder="Tên tài khoản" required>
                    <span></span>
                </div>

                <div class="box_one">
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                    <span></span>
                </div>

                <button type="submit" class="dk" name="dang_nhap">Đăng nhập</button>
                <div class="singup_link">
                    <p>Bạn chưa có tài khoản? <a href="index.php?act=dang_ky">Đăng ký tại đây</a></p>
                    <p><a href="index.php?act=quen_mk"> Quên mật khẩu ?</a></p>
                </div>
            </form>
            <h2 class="thongbao">
                <?php 
                  if(isset($thongbao) && ($thongbao!="")){
                    echo $thongbao;
                  }         
                ?>
            </h2>
        </div>
    </div>

    <script>
        function validateForm() {
            var passwordInput = document.getElementById("password");
            var passwordValue = passwordInput.value;

            // Kiểm tra độ dài của mật khẩu
            if (passwordValue.length < 6) {
                alert("Mật khẩu chứa ít nhất 6 ký tự.");
                return false;
            }

            // Kiểm tra có ít nhất 1 ký tự viết in hoa
            if (!/[A-Z]/.test(passwordValue)) {
                alert("Mật khẩu chứa ít nhất 1 ký tự viết in hoa.");
                return false;
            }

            // Mật khẩu hợp lệ
            return true;
        }
    </script>
</div>
