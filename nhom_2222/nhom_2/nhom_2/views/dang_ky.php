<div class="container">
    <div class="box_form">
        <div class="box">
            <form action="index.php?act=dang_ky" method="post" onsubmit="return validateForm()">
                <h1>Đăng ký</h1>
                <div class="box_one">
                    <input type="text" name="username" placeholder="Tên tài khoản" required>
                    <span></span>
                </div>
                <div class="box_one">
                    <input type="email" name="email" placeholder="Email" required >
                    <span></span>
                </div>
                <div class="box_one">
                    <input type="text" name="tel" id="tel" placeholder="Số điện thoại" required >
                    <span></span>
                </div>
                <div class="box_one">
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" required >
                    <span></span>
                </div>
                <div class="box_one">
                    <input type="password" name="password2" placeholder="Nhập lại mật khẩu" required >
                    <span></span>
                </div>
                <div class="gui">
                    <input type="submit" class="dk" name="dangky" value="Đăng ký">
                </div>
                <div class="singup_link">
                    <p>Bạn đã có tài khoản? <a href="index.php?act=dang_nhap">Đăng nhập tại đây</a></p>
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
            var telInput = document.getElementById("tel");
            var telValue = telInput.value;

            // Kiểm tra số điện thoại bắt đầu bằng số 0 và có 10 số
            if (!/^0\d{9}$/.test(telValue)) {
                alert("Số điện thoại không hợp lệ. Vui lòng nhập số điện thoại bắt đầu bằng số 0 và có tổng cộng 10 số.");
                return false;
            }

            var passwordInput = document.getElementById("password");
            var passwordValue = passwordInput.value;

            var confirmPasswordInput = document.getElementsByName("password2")[0];
            var confirmPasswordValue = confirmPasswordInput.value;

            // Kiểm tra mật khẩu và mật khẩu nhập lại phải giống nhau
            if (passwordValue !== confirmPasswordValue) {
                alert("Mật khẩu và mật khẩu nhập lại không khớp.");
                return false;
            }

            // Kiểm tra mật khẩu chứa ít nhất 1 ký tự viết in hoa và 1 ký tự đặc biệt
            if (!/[A-Z]/.test(passwordValue) || !/[^a-zA-Z0-9]/.test(passwordValue)) {
                alert("Mật khẩu phải chứa ít nhất 1 ký tự viết in hoa và 1 ký tự đặc biệt.");
                return false;
            }

            // Dữ liệu hợp lệ, cho phép submit form
            return true;
        }
    </script>
</div>
