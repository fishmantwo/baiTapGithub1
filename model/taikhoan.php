<?php
    function insert_taikhoan($email,$user,$pass) {
        $sql = "INSERT INTO taikhoan( email, user,pass) 
        VALUES ('$email','$user','$pass' )";
        pdo_execute($sql);
    }
    function check_user($user, $pass){
        $sql = "SELECT * FROM taikhoan WHERE user= '".$user."' AND pass= '".$pass."' ";
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function update_edit_taikhoan($id ,$user,$pass,$email,$address, $tel){
        $sql = "UPDATE taikhoan SET user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' WHERE id=".$id;
        pdo_execute($sql);
    }
    function check_email($email){
        $sql = "SELECT * FROM taikhoan WHERE email ='".$email."'";
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function load_all_taikhoan() {
        $sql = "SELECT * FROM taikhoan ORDER BY id DESC";
        $listtaikhoan =pdo_query($sql);
        return $listtaikhoan;
    }
    function detele_taikhoan($id) {
        $sql = "DELETE FROM taikhoan WHERE id=".$id;
        pdo_execute($sql);
    }

    function insert_taikhoan_batloi($email,$user,$pass){

        // Kiểm tra dữ liệu không được để trống
        if (empty($email) || empty($user) || empty($pass)) {
            $thongbao= "Vui lòng điền đầy đủ thông tin.";
        } else {
            // Kiểm tra định dạng email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $thongbao= "Địa chỉ email không hợp lệ.";
            } else {
                // Kiểm tra tên đăng nhập phải có ít nhất 6 ký tự (chữ và số)
                if (!preg_match("/^[a-zA-Z0-9]{6,}$/", $user)) {
                    $thongbao= "Tên đăng nhập phải có ít nhất 6 ký tự (chữ và số).";
                } else {
                    // Kiểm tra mật khẩu phải có ít nhất 1 chữ hoa, 1 chữ thường và 1 số
                    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{5,}$/", $pass)) {
                        $thongbao="Mật khẩu phải có ít nhất 5 kí tự 5 kí này ít có 1 chữ hoa, 1 chữ thường và 1 chữ số  .";
                    } else {
                        // Thực hiện insert dữ liệu vào cơ sở dữ liệu
                        $sql = "INSERT INTO taikhoan (email, user, pass) VALUES (?, ?, ?)";
                        try {
                            pdo_execute($sql, $email, $user, $pass);
                            $thongbao= "Đăng ký thành công!";
                        } catch (PDOException $e) {
                            $thongbao= "Lỗi: " . $e->getMessage();
                        }
                    }
                }
            }
        }
        return $thongbao;
    }
    
?>