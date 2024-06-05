<?php
// error_reporting(0);
session_start();

include "./views/header.php";
include "./model/pdo.php";
include "./model/san_pham.php";
include "./model/danh_muc.php";
include "globad.php";
include "./model/tai_khoan.php";
include "./model/binh_luan.php";

$san_pham_iphone = loadall_sanpham_home();
$san_pham_watch = loadall_sanpham_home_watch();
$san_pham_phukien = loadall_sanpham_home_phukien();
$san_pham_mac = loadall_sanpham_home_mac();
$danh_muc = loadall_danhmuc();
$danh_muc_nho_iphone = loadall_danhmucnho_iphone();
$danh_muc_nho_mac = loadall_danhmucnho_mac();
$danh_muc_nho_watch = loadall_danhmucnho_watch();
$danh_muc_nho_phukien = loadall_danhmucnho_phukien();
$dstop10 = loadall_sanpham_top10();
// $sanpham_BC = loadall_sanpham_BC();
 

if ((isset($_GET["act"])) && ($_GET["act"] != "")) {
    $act = $_GET["act"];
    switch ($act) {
        case "iphone":
            if (isset($_POST["kyw"]) && ($_POST["kyw"] != "")) {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = "";
            }
            if (isset($_GET["iddm_nho"]) && ($_GET["iddm_nho"] > 0)) {
                $iddm_nho = $_GET["iddm_nho"];
            } else {
                $iddm_nho = 0;
            }
            $ddsp = loadall_sanpham_dmn($kyw, $iddm_nho);
            $ten_dm = load_ten_danhmuc_nho($iddm_nho);
            include "./views/iphone.php";
            break;
        case "san_pham_ct":
            if (isset($_GET["idsp"]) && ($_GET["idsp"] > 0)) {
                $id = $_GET["idsp"];
                $spct = loadone_sanpham($id);
                extract($spct);
                $cung_loai = load_sanpham_cungloai($id, $iddm_nho);
                include "./views/san_pham_ct.php";
            } else {
                include "views/home.php";
            }

            break;
            case "sanpham":
                if (isset($_POST["kyw"]) && ($_POST["kyw"] != "")) {
                    $kyw = $_POST["kyw"];
                } else {
                    $kyw = "";
                }
                if (isset($_GET["iddm_nho"]) && ($_GET["iddm_nho"] > 0)) {
                    $iddm_nho = $_GET["iddm_nho"];
                } else {
                    $iddm_nho = 0;
                }
                $ddsp = loadall_sanpham($kyw, $iddm_nho);
                $ten_dm = load_ten_danhmuc_nho($iddm_nho);
                include "./views/sanpham.php";
                break;
        case "mac":
            if (isset($_POST["kyw"]) && ($_POST["kyw"] != "")) {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = "";
            }
            if (isset($_GET["iddm_nho"]) && ($_GET["iddm_nho"] > 0)) {
                $iddm_nho = $_GET["iddm_nho"];
            } else {
                $iddm_nho = 0;
            }
            $ddsp = loadall_sanpham_dmn_mac($kyw, $iddm_nho);
            $ten_dm = load_ten_danhmuc_nho($iddm_nho);
            include "./views/mac.php";
            break;
        case "watch":
            if (isset($_POST["kyw"]) && ($_POST["kyw"] != "")) {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = "";
            }
            if (isset($_GET["iddm_nho"]) && ($_GET["iddm_nho"] > 0)) {
                $iddm_nho = $_GET["iddm_nho"];
            } else {
                $iddm_nho = 0;
            }
            $ddsp = loadall_sanpham_dmn_watch($kyw, $iddm_nho);
            $ten_dm = load_ten_danhmuc_nho($iddm_nho);
            include "./views/watch.php";
            break;
            case "phu_kien":
                if (isset($_POST["kyw"]) && ($_POST["kyw"] != "")) {
                    $kyw = $_POST["kyw"];
                } else {
                    $kyw = "";
                }
                if (isset($_GET["iddm_nho"]) && ($_GET["iddm_nho"] > 0)) {
                    $iddm_nho = $_GET["iddm_nho"];
                } else {
                    $iddm_nho = 0;
                }
                $ddsp = loadall_sanpham_dmn_phukien($kyw, $iddm_nho);
                $ten_dm = load_ten_danhmuc_nho($iddm_nho);
                include "./views/phu_kien.php";
                break;
            case "dang_nhap":
                if (isset($_POST['dang_nhap'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $thongbao = "Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.";
                    $check = login($username, $password);
                } 
                include "./views/dang_nhap.php";
                break;
        case "dang_ky":
            if (isset($_POST['dangky']) && ($_POST['dangky'] > 0)) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                // $add = $_POST['address'];
                // $tel = $_POST['tel'];
                 insert_tai_khoan($username , $password, $email, $tel);
                $thongbao="Đăng ký tài khoản thành công vui lòng đăng nhập tài khoản để sử dụng!!!";
            }
            include "./views/dang_ky.php";
            break;
        case "quen_mk":
                    if (isset($_POST['guiemail'])) {
                         $email = $_POST['email'];
                        $sendMailMess = sendMail($email);
                        }
                     include "./views/quen_mk.php";
                        break;
        case 'thoat':
             session_unset();
             header("Location:index.php");
             break;
             
        case 'listCart':
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        try {
                            $cart = $_SESSION['cart'];
                            $productId = array_column($cart, 'id');
                            $idList = implode(',', $productId);
                            $dataDb = loadone_sanphamCart($idList);
                            error_reporting(0);
                            $delete = $_GET['xoa'];
                                if($delete == true)
                                {
                                    // die('true');
                                    unset($cart[$_GET['arr_key']]);
                                    $_SESSION['cart'] = $cart;
                                    header('location: index.php?act=listCart');
                                }
                           
                        } catch (Exception $e) {
                            echo "Có lỗi xảy ra: " . $e->getMessage();
                        }
                    } else {
                        echo "";
                    }
                    
                    include "views/listCartOrder.php"; 
                    break; 
               
        case 'address':
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        try {
                            $cart = $_SESSION['cart'];
                            $productId = array_column($cart, 'id');
                            $idList = implode(',', $productId);
                            $dataDb = loadone_sanphamCart($idList);
                            if (isset($_POST['xacnhan']))
                            {
                                
                                
                                $name = $_POST['tennguoinhan'];
                                $phone = $_POST['phone'];
                                $tinh = $_POST['tinh'];
                                $diachi = $_POST['diachi'];
                                $diachi2 = "$diachi, $tinh";
                                $phuongthuc = $_POST['phuong_thuc'];
                                if ($phuongthuc == 'tien_mat')
                                {
                                    $phuongthuc = "Tiền mặt";
                                } else if ($phuongthuc == 'chuyen_khoan')
                                {
                                    $phuongthuc = "Chuyển khoản ngân hàng";
                                } else {
                                    $phuongthuc = "Không xác định";
                                }
                                foreach($cart as $intu)
                                {
                                    $productid = $intu['id'];
                                    $productColor = $intu['color'];
                                    $quantity = $intu['quantity'];
                                    $price = $intu['price'];
                                    $tensp = $intu['name'];
                                    $tong_tien = $quantity * $price;
                                    // echo $intu['name'];
                                    $them = mua($_SESSION['username'], $name, $phone, $diachi2, $productid, $tensp, $productColor, $quantity, $tong_tien, date("Y-m-d H:i:s"), "dang xu li", $phuongthuc);
                                   
                                }
                                echo '<script>window.location.href = "index.php?act=dat_hang";</script>';
                                
                                
                            }
                            
                        } catch (Exception $e) {
                            echo "Có lỗi xảy ra: " . $e->getMessage();
                        }
                    } else {
                        echo "";
                    }
                    include "views/address.php"; 
                    break; 
        case 'thongtindonhang':
                       
                       $ttdh = get_thong_tin_don_hang($_SESSION['username']);
                       error_reporting(0);
                       if ($_GET['delete'] == true)
                       {
                        $huy = huy_don($_GET['id_del']);
                        echo '<script>alert("Hủy đơn thành công");</script>';
                        header('location: index.php?act=thongtindonhang');
                       }
                        include "views/thongtindonhang.php"; 
                        break; 
                    case 'dat_hang':
                        include "views/dat_hang.php"; 
                        break;
        default:
            include "./views/home.php";
            break;
    }
} else {
    include "./views/home.php";
}
include "./views/footer.php";