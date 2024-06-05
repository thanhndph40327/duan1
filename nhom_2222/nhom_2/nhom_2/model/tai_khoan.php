<?php
function huy_don($id_don)
{
    $sql = "DELETE FROM `don_hang` WHERE `id` = '$id_don'";
    $ttdh = pdo_execute($sql);
    return $ttdh;
}   
function get_thong_tin_don_hang($username)
{
    $sql = "SELECT * FROM `don_hang` WHERE `username` = '$username'";
    $ttdh = pdo_query($sql);
    return $ttdh;
}   
function insert_tai_khoan($username, $password, $email, $tel)
{
    $sql = "INSERT INTO `tai_khoan` (`username`, `password`, `email`,  `tel`) VALUES ('$username','$password','$email', '$tel')";
    pdo_execute($sql);
}   
function mua($username, $name, $sdt, $diachi, $idsp, $tensp, $color, $soluong, $tongtien, $ngaymua, $trangthai, $phuong_thuc_thanh_toan )
{
    $sql = "INSERT INTO `don_hang` (`username`, `nguoi_nhan`, `phone_number`,  `idsp`, `tensp`, `color`, `so_luong`, `tong_tien`, `dia_chi`,`phuong_thuc_thanh_toan`, `ngay_mua`, `trang_thai`)
    VALUES ('$username','$name','$sdt', '$idsp', '$tensp','$color', '$soluong', '$tongtien', '$diachi','$phuong_thuc_thanh_toan', '$ngaymua', '$trangthai')";
    pdo_execute($sql);
}  
function checkuser($username, $password)
{
    $sql = "SELECT * FROM tai_khoan WHERE username='" . $username . "' AND password='" . $password . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function login($username, $password)
{
    $username = checkuser($username, $password);
    if ($username) {
        if ($username['role'] == 1) {
            // Role là 1, đăng nhập vào trang admin
            $_SESSION['username'] = $username['username'];
            $_SESSION['iduser'] = $username['id'];
            $_SESSION['role'] = $username['role'];
            header("Location:index.php");
            exit();
        } else {
            // Role không phải là 1, đăng nhập vào trang người dùng thông thường
            $_SESSION['username'] = $username['username'];
            $_SESSION['iduser'] = $username['id'];
            $_SESSION['role'] = $username['role'];
            header("Location: index.php");
            exit();
        }
    } else {
        // Đăng nhập không thành công
        $thongbao = "Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.";
    }
}


function loadall_taikhoan()
{
    $sql = "SELECT * FROM tai_khoan ORDER BY id DESC";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function delete_taikhoan($id)
{
    $sql = "DELETE FROM tai_khoan WHERE id=" . $id;
    pdo_execute($sql);
}
function sendMail($email)
{
    $sql = "SELECT * FROM tai_khoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);
    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan['username'], $taikhoan['password']);
        return "Gửi Mail Thành Công";
    } else {
        return "Email Không Đúng";
    }
}
// function update_role($role, $id)
// {
//     $sql = "UPDATE `tai_khoan` SET `role` = '$role' WHERE `tai_khoan`.`id` = {'$id'}";
//     $tk = pdo_execute($sql);
//     return $tk;

// }
    function loadone_taikhoan($id)
{
    $sql = "SELECT * FROM tai_khoan WHERE id=" . $id;
    $vt = pdo_query_one($sql);
    return $vt;
}
// function update_taikhoan( $role, $id)
// {
//     $sql = "UPDATE `tai_khoan` SET `role` = '$role' WHERE `tai_khoan`.`id` = {'$id'}";
//     $tk = pdo_execute($sql);
//     return $tk;
// }
function update_account_role($new_role, $username_pk) {
    // In ra câu truy vấn để kiểm tra
    // echo "SQL Query: UPDATE `tai_khoan` SET `role` = '$new_role' WHERE `username` = '$username_pk'";

    // Thực hiện truy vấn để cập nhật vai trò của tài khoản trong cơ sở dữ liệu
    $sql = "UPDATE `tai_khoan` SET `role` = '$new_role' WHERE `username` = '$username_pk'";
    $result = pdo_execute($sql);

    return $result;
}

function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '3aee240e2c7956';                     //SMTP username
        $mail->Password   = 'cdb24a88a702aa';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('damhieuph32592@example.com', 'damhieu');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'BAN QUEN MAT KHAU';
        $mail->Body    = 'MAT KHAU CU CUA BAN LA: ' . $pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}