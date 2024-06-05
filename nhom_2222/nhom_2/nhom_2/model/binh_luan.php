<?php
    function insert_binh_luan($noidung, $iduser, $idpro, $ngaybinhluan, $username){
        
        $ngaybinhluan = date('Y-m-d');
        $sql = " INSERT INTO `binh_luan` (`username`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES ('$username', '$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
        pdo_execute($sql);
    }
    // function loadall_binh_luan($idpro)
    // {
    //     $sql = "SELECT * FROM binh_luan WHERE 1";
    //     if ($idpro > 0)
    //         $sql .= " AND idsp= '" . $idpro . "'";
    //     $sql .= " ORDER BY id DESC LIMIT 0,2";
    //     $listbinhluan = pdo_query($sql);
    //     return $listbinhluan;
    // }
    function loadall_binh_luan($idpro) {
        $sql = "SELECT * FROM binh_luan WHERE 1";
    
        if ($idpro > 0) {
            $sql .= " AND idpro = '" . $idpro . "'";
        }
    
        $sql .= " ORDER BY id DESC";
        
        $listbl = pdo_query($sql);
        
        return $listbl;
    }
    function loadone_binh_luan($id){
        $sql = "SELECT * FROM binh_luan WHERE id =".$id; 
        $bl = pdo_query_one($sql);
        return $bl;
    }
    function delete_binh_luan($id)
    {
        $sql = "DELETE FROM binh_luan WHERE id=" . $id;
        pdo_execute($sql);
    }
    
?>