<?php


function insert_danhmuc($ten_loai, $anh_dm)
{
    $sql = "INSERT INTO danh_muc(name, img) values('$ten_loai','$anh_dm')";
    pdo_execute($sql);
}
function insert_danhmucnho($ten_dmn, $iddm_nho)
{
    $sql = "INSERT INTO danh_muc_nho(name, iddm_nho) values('$ten_dmn','$iddm_nho')";
    pdo_execute($sql);
}
function delete_danhmuc($id)
{
    $sql = "DELETE FROM danh_muc WHERE id=" . $id;
    pdo_execute($sql);
}
function delete_danhmucnho($id)
{
    $sql = "DELETE FROM danh_muc_nho WHERE id=" . $id;
    pdo_execute($sql);
}

function loadall_danhmuc()
{
    $sql = "SELECT * FROM danh_muc ORDER BY id DESC limit 0,4";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadall_danhmucnho()
{
    $sql = "SELECT * FROM danh_muc_nho ORDER BY id DESC";
    $listdanhmuc_nho = pdo_query($sql);
    return $listdanhmuc_nho;
}
// dddddd
function loadall_danhmucnho_iphone()
{
    $sql = "SELECT * FROM danh_muc_nho WHERE iddm_nho like '%27%' ORDER BY id DESC";
    $listdanhmuc_nho = pdo_query($sql);
    return $listdanhmuc_nho;
}
function loadall_danhmucnho_mac()
{
    $sql = "SELECT * FROM danh_muc_nho WHERE iddm_nho like '%26%' ORDER BY id DESC";
    $listdanhmuc_nho = pdo_query($sql);
    return $listdanhmuc_nho;
}
function loadall_danhmucnho_watch()
{
    $sql = "SELECT * FROM danh_muc_nho WHERE iddm_nho like '%25%' ORDER BY id DESC";
    $listdanhmuc_nho = pdo_query($sql);
    return $listdanhmuc_nho;
}
function loadall_danhmucnho_phukien()
{
    $sql = "SELECT * FROM danh_muc_nho WHERE iddm_nho like '%24%' ORDER BY id DESC";
    $listdanhmuc_nho = pdo_query($sql);
    return $listdanhmuc_nho;
}
// ddddđ
function loadone_danhmuc($id)
{
    $sql = "SELECT * FROM danh_muc WHERE id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function loadone_danhmucnho($id)
{
    $sql = "SELECT * FROM danh_muc_nho WHERE id=" . $id;
    $dmn = pdo_query_one($sql);
    return $dmn;
}

// phần update danh muc
function update_danhmuc($ten_loai, $anh_dm, $id)
{
    if ($anh_dm != "") {
        $sql = "UPDATE danh_muc SET name = '$ten_loai', img = '$anh_dm' WHERE id = '$id'";
        pdo_execute($sql);
        // echo "<script language='javascript'>alert('đã cập nhật thành công');</script>";
    } else {
        $sql = "UPDATE danh_muc SET name = '$ten_loai', img = '$anh_dm' WHERE id = '$id'";
        pdo_execute($sql);
        // echo "<script language='javascript'>alert('đã cập nhật thành công');</script>";
    }
}
function update_danhmucnho($ten_dmn, $iddm_nho, $id)
{
    $sql = "UPDATE danh_muc_nho SET name = '$ten_dmn', iddm_nho = '$iddm_nho' WHERE id = '$id'";
    $dm = pdo_execute($sql);
    // die($dm);
    return $dm;
}
