<?php
    function insert_danhmuc($tenloai) {
         // Kiểm tra xem trường "tenloai" có bị để trống không
         if (empty($tenloai)) {
            $thongbao = "Tên loại không được để trống";
        } else {
            // Kiểm tra xem tên loại đã tồn tại trong cơ sở dữ liệu chưa
            $sql = "SELECT * FROM danhmuc WHERE name = ?";
            $existingLoai = pdo_query_one($sql, $tenloai);
    
            if ($existingLoai) {
                $thongbao = "Tên loại đã tồn tại trong cơ sở dữ liệu";
            } else {
                // Thực hiện thêm dữ liệu vào cơ sở dữ liệu
                $insertSql = "INSERT INTO danhmuc (name) VALUES (?)";
                try {
                    pdo_execute($insertSql, $tenloai);
                    $thongbao = "Thêm mới thành công!";
                    // Nếu cần thực hiện các thao tác khác sau khi thêm dữ liệu, thực hiện ở đây.
                } catch (PDOException $e) {
                    $thongbao = "Lỗi: " . $e->getMessage();
                }
            }
        }
            return $thongbao;
        }
       
    function detele_danhmuc($id) {
        $sql = "DELETE FROM danhmuc WHERE id=".$id;
        pdo_execute($sql);
    }
    function loaddm_all() {
        $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
        $listdanhmuc =pdo_query($sql);
        return $listdanhmuc;
    }
    function loaddm_one($id){
        $sql = "SELECT * FROM danhmuc WHERE id=".$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id, $tenloai){
        $sql = "UPDATE danhmuc SET name='".$tenloai."' WHERE id=".$id;
        pdo_execute($sql);
    }
