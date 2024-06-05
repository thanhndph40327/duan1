
<?php 
function loadone_giohangchon($id)
{
    $sql = "select * from giohang where id='".$id."'";
    $listgiohang = pdo_query_one($sql);
    return $listgiohang;
}function insert_diachi($id_user,$name, $tel, $email, $addressother)
{
    $sql = "INSERT INTO `dia_chi`( `id_user`,`name`, `tel`,`email`,`addressother`) VALUES ('$id_user','$name','$tel','$email','$addressother')";
    pdo_execute($sql);
}
function checkiduser($id){
    $sql = "SELECT *
    FROM dia_chi
    WHERE id_user = '".$id."'
    AND EXISTS (SELECT * FROM taikhoan WHERE taikhoan.id = dia_chi.id_user)";
    $sp = pdo_query($sql);
    return $sp;
}
function loadall_donhang()
{
    $sql = "SELECT * FROM don_hang ORDER BY id DESC";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}function loadall_doanhthu()
{
    $sql = "SELECT idsp, tensp, SUM(tong_tien) as total_revenue, SUM(so_luong) as total_quantity
            FROM `don_hang`
            WHERE trang_thai LIKE '%Đã giao%'
            GROUP BY idsp, tensp";
    
    $list_doanhthu = pdo_query($sql);
    return $list_doanhthu;
}


function loadone_donhang($id)
{
    $sql = "SELECT * FROM don_hang WHERE id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_tinh_trang_don_hang( $tinh_trang, $id)
{
    $sql = "UPDATE `don_hang` SET `trang_thai` = '$tinh_trang' WHERE id = '$id'";
    $dm = pdo_execute($sql);
    // die($dm);
    return $dm;
}
function delete_don_hang($id)
{
    $sql = "DELETE FROM don_hang WHERE id=" . $id;
    pdo_execute($sql);
}
?>