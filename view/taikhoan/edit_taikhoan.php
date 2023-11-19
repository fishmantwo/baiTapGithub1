<div class="row mb">
    <!-- box ở bên trái -->
    <div class="boxtrai mr">
        <!-- ĐĂNG KÝ -->
        <div class="row mb">
            <div class="boxtitle">CẬP NHẬT THÀNH VIÊN</div>
            <div class="row boxcontent ">
                <?php
                    if(isset($_SESSION['user'])&& (is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                    }
                
                ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                    <div class="formTaiKhoan">
                        
                        <div class="row mb10">
                            Email
                            <input type="email" name="email" id="" value="<?=$email?>"> 
                        </div>
                        <div class="row mb10">
                            Tên đăng nhập
                            <input type="text" name="user" value="<?=$user?>"> <br>
                        </div>
                        <div class="row mb10">
                            Mật Khẩu
                            <input type="password" name="pass" id="" value="<?=$pass?>"><br>
                        </div>
                        <div class="row mb10">
                            Địa chỉ
                            <input type="text" name="address" id="" value="<?=$address?>"><br>
                        </div>
                        <div class="row mb10">
                            Điện thoại
                            <input type="text" name="tel" id="" value="<?=$tel?>"><br>
                        </div>
                        <div class="row mb10">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" value="Cập Nhật" name="capnhat">
                            <input type="reset" value="Nhập lại">
                        </div>
                    </div>
                </form>
                <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo '<h2 style="color: red;">'.$thongbao.'</h2>';
                    }
                ?>
            </div>
        </div>
       
    </div>

    <!-- box ở bên phải -->
    <div class="boxphai">
        <?php
        require_once "view/boxright.php";
        ?>

    </div>
</div>