
<?php
function loadall_thongke(){
  $sql = "select danh_muc.id as madm, danh_muc.name as tendm, count(san_pham.id) as countsp, min(san_pham.price) as minprice, 
  max(san_pham.price) as maxprice, avg(san_pham.price) as avgprice
  from danh_muc_nho
  join san_pham on san_pham.iddm_nho= danh_muc_nho.id
  JOIN danh_muc on danh_muc_nho.iddm_nho=danh_muc.id
  group by danh_muc.id, danh_muc.name
  order by danh_muc.id asc
  ";

  return pdo_query($sql);
}
function loadall_thongkethang(){
  $sql = "SELECT * FROM don_hang 
  WHERE phuong_thuc_thanh_toan = 'Tiền mặt' 
  AND trang_thai = 'Đã giao' 
  AND MONTH(ngay_mua) = 12;";
  return pdo_query($sql);
 }
?>
