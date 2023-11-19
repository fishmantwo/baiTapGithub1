<div class="row mb">
    <!-- box ở bên trái -->
    <div class="boxtrai mr">
        <!-- ĐĂNG KÝ -->
        <div class="row mb">
            <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="row boxcontent ">
                <form action="index.php?act=dangky" method="post">
                    <div class="formTaiKhoan">
                        <div class="row mb10">
                            Email
                            <input type="email" name="email" id=""> 
                        </div>
                        <div class="row mb10">
                            Tên đăng nhập
                            <input type="text" name="user"> <br>
                        </div>
                        <div class="row mb10">
                            Mật Khẩu
                            <input type="password" name="pass" id=""><br>
                        </div>
                        <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại">
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
<script src="../../js/chonAll.js"></script>