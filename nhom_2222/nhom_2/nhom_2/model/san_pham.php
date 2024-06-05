<?php
function insert_sanpham($ten_sp, $gia_sp, $anh_sp, $mota_sp, $mota_sp_2, $iddm_nho)
{
    $sql = "INSERT INTO san_pham(name, price, img, mota, mota2, iddm_nho) values('$ten_sp','$gia_sp','$anh_sp','$mota_sp','$mota_sp_2','$iddm_nho')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "DELETE FROM san_pham WHERE id=" . $id;
    pdo_execute($sql);
}
function get_img_sanpham($id)
{
    $sql = "SELECT img FROM san_pham WHERE `id` = '$id'";
    
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw, $iddm_nho)
{
    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm_nho > 0) {
        $sql .= " and iddm_nho ='" . $iddm_nho . "'";
    }
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// dddddd
function loadall_sanpham_dmn($kyw, $iddm_nho)
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%iphone%'    ";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm_nho > 0) {
        $sql .= " and iddm_nho ='" . $iddm_nho . "'";
    }
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_dmn_watch($kyw, $iddm_nho)
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%watch%'    ";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm_nho > 0) {
        $sql .= " and iddm_nho ='" . $iddm_nho . "'";
    }
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_dmn_phukien($kyw, $iddm_nho)
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%phu%'   ";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm_nho > 0) {
        $sql .= " and iddm_nho ='" . $iddm_nho . "'";
    }
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_dmn_mac($kyw, $iddm_nho)
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%mac%%'    ";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm_nho > 0) {
        $sql .= " and iddm_nho ='" . $iddm_nho . "'";
    }
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_ten_danhmuc_nho($iddm_nho)
{
    if ($iddm_nho > 0) {
        $sql = "SELECT * FROM danh_muc_nho WHERE id=" . $iddm_nho;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
// dddddd
function load_ten_danhmuc($iddm_nho)
{
    if ($iddm_nho > 0) {
        $sql = "SELECT * FROM danh_muc WHERE id=" . $iddm_nho;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
function loadall_sanpham_home()
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%iphone%'";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home_watch()
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%watch%'";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home_phukien()
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%phu%'";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home_mac()
{
    $sql = "SELECT * FROM `san_pham` WHERE name like '%mac%'";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_banchay()
{
    $sql = "SELECT * FROM san_pham where view order by desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM san_pham WHERE id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id, $iddm_nho)
{
    $sql = "SELECT * FROM san_pham WHERE iddm_nho=" . $iddm_nho. " AND id <>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function  update_sanpham($id, $ten_sp, $gia_sp, $anh_sp, $mota_sp, $mota_sp2, $iddm_nho)
{
    if ($anh_sp != "") {
        $sql = "UPDATE san_pham SET name = '$ten_sp', price = '$gia_sp', img = '$anh_sp', mota = '$mota_sp', mota2 = ' $mota_sp2', iddm_nho = '$iddm_nho' WHERE `id` = '$id'";
        pdo_execute($sql);
        echo "<script language='javascript'>alert('đã cập nhật thành công');</script>";
    } else {
        $sql = "UPDATE san_pham SET name = '$ten_sp', price = '$gia_sp', mota = '$mota_sp', mota2 = ' $mota_sp2', iddm_nho = '$iddm_nho' WHERE `id` = '$id'";
        pdo_execute($sql);
        echo "<script language='javascript'>alert('đã cập nhật thành công');</script>";
    }
}
function loadone_sanphamCart ($idList){
    $sql = "SELECT * FROM `san_pham` WHERE `id` IN ('. $idList .')";
    $sanpham = pdo_query($sql);
    return $sanpham;
}function loadall_sanpham_top10()
{
    $sql = "SELECT * FROM `san_pham` WHERE 1 order by view desc limit 0,4 ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;    
}
function loadall_sp()
{
    $sql = "SELECT * FROM san_pham ORDER BY id DESC ";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}