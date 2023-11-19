<?php
    function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan) {
        $sql = "INSERT INTO binh(noidung, iduser, idpro, ngaybinhluan) VALUES ('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loaddm_all_binhluan($idpro) {
        $sql = "SELECT * FROM binh WHERE 1";
        if($idpro>0)  {
            $sql.= " AND idpro='".$idpro."'";
        }
        $sql.=" ORDER BY id DESC";
        $listbinhluan =pdo_query($sql);
        return $listbinhluan;
    }
    function  detele_binhluan($id) {
        $sql = "DELETE FROM binh WHERE id=".$id;
        pdo_execute($sql);
    }

?>