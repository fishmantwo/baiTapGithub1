<div class="row mb">
    <!-- box ở bên trái -->
    <div class="boxtrai mr">
        <!-- ĐĂNG KÝ -->
        <div class="row mb">
            <div class="boxtitle">QUÊN MẬT KHẨU</div>
            <div class="row boxcontent ">
                <form action="index.php?act=quenmk" method="post">
                    <div class="formTaiKhoan">
                        <div class="row mb10">
                            Email
                            <input type="email" name="email" id=""> 
                        </div>
                       
                        <div class="row mb10">
                            <input type="submit" value="Gửi" name="gui">
                                <input type="reset" value="Nhập lại">
                        </div>
                        
                    </div>
                </form>
                <?php
                    if(isset( $thongbaomk)&&( $thongbaomk!="")){
                        echo '<h2 style="color: red;">'. $thongbaomk.'</h2>';
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