<?php
session_start();
include "header.php";
include "../model/pdo.php";
include "../model/san_pham.php";
include "../model/danh_muc.php";
include "../model/binh_luan.php";
include "../model/tai_khoan.php";
include "../model/thong_ke.php";
include "../model/giohang.php";

if ($_SESSION['role'] != 1)
{
    echo '<script>alert("Bạn không phải Admin");window.location.href="../index.php";</script>';
}

if ((isset($_GET["act"])) && ($_GET["act"] != "")) {
    $act = $_GET["act"];
    switch ($act) {
            // Danh mục
        case "add_danhmuc":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $ten_loai = $_POST['tenloai'];
                $anh_dm = $_FILES["anhdm"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhdm"]["name"]);
                if (move_uploaded_file($_FILES["anhdm"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_danhmuc($ten_loai, $anh_dm);
                $thong_bao = "Thêm sản phẩm thành công";
            }
            include "danhmuc/add_danhmuc.php";
            break;
        case "list_danhmuc":
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list_danhmuc.php";
            break;

            case "thong_ke1":
                
                $tk = loadall_thongkethang();
                $tongtien = 0;
                foreach ($tk as $thongke) {
                   extract($thongke);
                  $tongtien += $tong_tien;
                 }
                include "thongke/list_thongke1.php";
                break;

        case 'xoa_dm':
            if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                delete_danhmuc($_GET["id"]);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list_danhmuc.php";
            break;

        case "sua_dm":
            if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                $dm = loadone_danhmuc($_GET["id"]);
            }
            include "danhmuc/update_dm.php";
            break;
        case "update_dm":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST["id"];
                $ten_loai = $_POST['tenloai'];
                $anh_dm = $_FILES["anhdm"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhdm"]["name"]);
                if (move_uploaded_file($_FILES["anhdm"]["tmp_name"], $target_file)) {
                } else {
                }
                update_danhmuc($ten_loai, $anh_dm, $id);
                $thong_bao = "Update sản phẩm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/update_dm.php";
            break;




        case "add_danhmucnho":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm_nho = $_POST['iddm_nho'];
                $ten_dmn = $_POST['tendmn'];
                insert_danhmucnho($ten_dmn, $iddm_nho);
                $thong_bao = "Thêm sản phẩm thành công";
            }
            // $listdanhmucnho = loadall_danhmucnho();
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/add_danhmucnho.php";
            break;
        case "list_danhmucnho":
            $listdanhmucnho = loadall_danhmucnho();
            include "danhmuc/list_danhmucnho.php";
            break;
        case 'xoa_nho':
            if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                delete_danhmucnho($_GET["id"]);
            }
            $listdanhmucnho = loadall_danhmucnho();
            include "danhmuc/list_danhmucnho.php";
            break;

        case "sua_dmn":
            if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                $dmn = loadone_danhmucnho($_GET["id"]);
            }
            $listdanhmucnho = loadall_danhmucnho();
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/update_dmn.php";
            break;
        case "update_dmn":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST["id"];
                $ten_dmn = $_POST["tendmn"];
                $iddm_nho = $_POST["iddm_nho"];
                update_danhmucnho($ten_dmn, $iddm_nho, $id);
                $thong_bao = "Update sản phẩm thành công";
            }
            $listdanhmucnho = loadall_danhmucnho();
            $listdanhmuc = loadall_danhmuc();
            // die($listdanhmuc);
            include "danhmuc/update_dmn.php";
            break;

            // Sản phẩm
        case "add_sanpham":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm_nho = $_POST['iddm_nho'];
                $ten_sp = $_POST['tensp'];
                $gia_sp = $_POST['giasp'];
                $mota_sp = $_POST['motasp'];
                $mota_sp_2 = $_POST['motasp2'];
                $anh_sp = $_FILES["anhsp"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_sanpham($ten_sp, $gia_sp, $anh_sp, $mota_sp, $mota_sp_2, $iddm_nho);
                $thong_bao = "Thêm sản phẩm thành công";
            }
            $listdanhmucnho = loadall_danhmucnho();
            // $listdanhmuc = loadall_danhmuc();
            include "sanpham/add_sanpham.php";
            break;
        case "list_sanpham":
            if (isset($_POST['go']) && ($_POST['go'])) {
                $kyw = $_POST["kyw"];
                $iddm = $_POST["iddm_nho"];
            } else {
                $kyw = "";
                $iddm = 0;
            }
            $listdanhmucnho = loadall_danhmucnho();
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include "sanpham/list_sanpham.php";
            break;
        case 'xoa_sp':
            if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                delete_sanpham($_GET["id"]);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list_sanpham.php";
            break;

        case 'thong_ke':
                $listthongke = loadall_thongke();
               
                // $listThongke=loaall_Thongke();
                include "thongke/list_thongke.php";
                break;
        case 'bieu_do' :
                    $listthongke = loadall_thongke();
                   
                    include "thongke/list_bieudo.php";
        break;
        case "list_binhluan":
            $listbinhluan = loadall_binh_luan(0);
            include "binhluan/list_binhluan.php";
            break;
        case 'xoa_bl':
            if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                delete_binh_luan($_GET["id"]);
            }
            $listbinhluan = loadall_binh_luan("", 0);
            include "binhluan/list_binhluan.php";
            break;
        case "list_taikhoan":
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list_taikhoan.php";
            break;
        case 'xoa_tk':
            if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                delete_taikhoan($_GET["id"]);
            }
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list_taikhoan.php";
            break;
        case 'thoat':
            session_unset();
            header("Location:../index.php");
            break;

        case "sua_vt":
                if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                    $vt = loadone_taikhoan($_GET["id"]);
                }
                $listtaikhoan = loadall_taikhoan();
                include "taikhoan/phan_quyen.php";
                break;
        case 'phan_quyen':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $username_pk = $_POST["ten"];
                    $new_role = $_POST["role"];
                    update_account_role($new_role, $username_pk);
                    $thong_bao = "Update thành công";
                }
                $list__taikhoan = loadall_taikhoan();
                // die($listdanhmuc);
                include "taikhoan/phan_quyen.php";
                break;
                
        case "hang_da_ban":
                    $donhang = loadall_donhang();
                    include "hang_da_ban/hang_da_ban.php";
                    break;
                    case 'xoa_dh':
                        if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                            delete_don_hang($_GET["id"]);
                        }
                        $donhang = loadall_donhang();
                        include "hang_da_ban/hang_da_ban.php";
                        break;
        case "sua_dh":
                    if (isset($_GET["id"]) && ($_GET["id"]) > 0) {
                        $dh =  loadone_donhang($_GET['id']);
                    }
                    $donhang = loadall_donhang();
                    include "hang_da_ban/tinh_trang_don_hang.php";
                    break;

        case 'tinh_trang_don_hang':
                        if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                            
                            $tinh_trang = $_POST["tinh_trang"];
                            
                            update_tinh_trang_don_hang( $tinh_trang, $_POST['id']);
                            $thong_bao = "Update trạng thái thành công";
                        }
                        $donhang = loadall_donhang();
                        // die($listdanhmuc);
                        include "hang_da_ban/tinh_trang_don_hang.php";
                        break;
        case "doanh_thu":
                            $doanhthu = loadall_doanhthu();
                            include "thongke/doanh_thu.php";
                            break;
        case 'bieu_do_doanh_thu' :
                                $doanhthu = loadall_doanhthu();
                                include "thongke/list_doanhthu.php";  
                                break; 
        default:
            $listdanhmucnho = loadall_danhmucnho();
            $listbinhluan = loadall_binh_luan(0);
            $listtaikhoan = loadall_taikhoan();
            $donhang = loadall_donhang();
            $listsanpham = loadall_sp();
            $listdanhmuc = loadall_danhmuc();
            include "home.php";
            break;
    }
} else {
    $listdanhmucnho = loadall_danhmucnho();
    $listbinhluan = loadall_binh_luan(0);
    $listtaikhoan = loadall_taikhoan();
    $donhang = loadall_donhang();
    $listsanpham = loadall_sp();
    $listdanhmuc = loadall_danhmuc();
    include "home.php";
}
include "footer.php";
