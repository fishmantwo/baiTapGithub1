<?php
    function insert_sanpham($tensp,$gia,$hinh,$mota,$iddm) {
        $sql = "INSERT INTO sanpham( name, price,img,mota,iddm) 
        VALUES ('$tensp','$gia','$hinh','$mota','$iddm')";
        pdo_execute($sql);
    }
    function detele_sanpham($id) {
        $sql = "DELETE FROM sanpham WHERE id=".$id;
        pdo_execute($sql);
    }
    function loadsp_all_home() {
        $sql = "SELECT * FROM sanpham Where 1 ORDER BY id DESC limit 0,9" ;
        $listsanpham =pdo_query($sql);
        return $listsanpham; 
    }
    function loadsp_all_home_top5() {
        $sql = "SELECT * FROM sanpham Where 1 ORDER BY luotxem DESC limit 0,5   " ;
        $listsanpham =pdo_query($sql);
        return $listsanpham; 
    }
    function loadsp_all($kyw, $iddm) {
        $sql = "SELECT * FROM sanpham Where 1";
        // đk kiểm tra input text name tên kyw
        if($kyw!=""){
            $sql .=" and name LIKE '%".$kyw."%'";
        }
        // đk kiểm tra input select name tên iddm
        if($iddm>0){
            $sql.=" AND iddm = '".$iddm."'";
        }

        $sql.=" ORDER BY id DESC";
        $listsanpham =pdo_query($sql);
        return $listsanpham;
    }
    function loadsp_one($id){
        $sql = "SELECT * FROM sanpham WHERE id=".$id;
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function loadsp_one_sanpham_cungloai($id,$iddm){
        $sql = "SELECT * FROM sanpham WHERE iddm=".$iddm." AND id <>".$id;
        $listsanpham =pdo_query($sql);
        return $listsanpham; 
    }
    function update_sanpham($id,$iddm,$tensp,$gia,$hinh,$mota){
        if($hinh!=""){
             $sql = "UPDATE sanpham SET iddm='".$iddm."', name='".$tensp."', price='".$gia."', mota='".$mota."',img='".$hinh."' WHERE id=".$id;
        }else{
            $sql = "UPDATE sanpham SET iddm='".$iddm."', name='".$tensp."', price='".$gia."', mota='".$mota."' WHERE id=".$id;
        }
       
        pdo_execute($sql);
    }
    function load_ten_dm($iddm){
        if($iddm>0){
             $sql="SELECT * FROM danhmuc WHERE id=".$iddm;
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        }
       
    }
?>