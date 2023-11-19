    <!-- box tài khoản -->
    <div class="row mb">
        <div class="boxtitle">TÀI KHOẢN</div>

        <div class="boxcontent formTaiKhoan">
            <?php
                if(isset( $_SESSION['user'])){
                    extract( $_SESSION['user']);
                
            ?>
            <div class="row mb10">
                Xin chào <h3 style="color: red;"> <?=$user?></h3>
            </div>
            <div class="row mb10">
                <li>
                    <a href="index.php?act=quenmk">Quên mật khẩu</a>
                </li>
                <li>
                    <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                </li>
                <?php
                    if($role ==1){
                ?>
                <li>
                    <a href="admin/index.php">Đăng nhập Admin</a>
                </li>
                <?php }?>
                <li><a href="index.php?act=thoat">Thoát</a></li>
            </div>


            <?php
                }else{
            ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="row mb10">
                    Tên đăng nhập <br>
                    <input type="text" name="user" id="">
                </div>
                <div class="row mb10">
                    Mật Khẩu<br>
                    <input type="password" name="pass" id=""><br>
                 </div>
                <div class="row mb10">
                    <input type="checkbox" name="" id="">Ghi nhớ tài khoảng?<br>
                </div> 
                <div class="row mb10">
                    <input type="submit" value="Đăng Nhập" name="dangnhap">
                </div>
            </form>
            <li>
                <a href="#">Quên Mật Khẩu</a>
            </li>
            <li>
                <a href="index.php?act=dangky">Đăng kí thành viên</a>
            </li>
            <?php } ?>
            <?php
                 if(isset($thongbao)&&($thongbao!="")){
                    echo '<h2 style="color: red;">'.$thongbao.'</h2>';
                }
            ?>
        </div>
    </div>
    <!-- box danh mục -->
    <div class="row mb">
        <div class="boxtitle">DANH MỤC</div>
            <div class="boxcontent2 menudoc">
                <ul>
                    <?php
                        foreach($dsdm as $dm){
                            extract($dm);
                            $linkdm="index.php?act=sanpham&iddm=".$id;
                            echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                        }                    
                    ?>
                    <!-- <li><a href="#">ÁO THUN</a></li>
                    
                    <li><a href="#">ÁO KHOÁC</a></li>
                    
                    <li><a href="#">ÁO SƠ MI</a></li>
                    
                    <li><a href="#">QUẦN TÂY</a></li>
                    
                    <li><a href="#">QUẦN JEAN</a></li>
                    
                    <li><a href="#">QUẦN SHORT</a></li>
                    
                    <li><a href="#">QUẦN JOGGER</a></li>
                    
                    <li><a href="#">BALO</a></li>
                    
                    <li><a href="#">GIÀY</a></li>
                    
                    <li><a href="#">DÉP NAM</a></li> -->
                    
                </ul>
            </div>
        <div class="boxfooter searchbox"> 
            <form action="index.php?act=sanpham" method="post">
                <input type="text" name="kyw">
                <input type="submit" name="timkiem" value="timkiem">
            </form>
        </div>
    </div>
    <!-- top 5 sản phẩm yêu thích -->
    <div class="row">
        <div class="boxtitle">TOP 5 YÊU THÍCH</div>
        <div class="row boxcontent">
            <?php
                foreach($luotxem_top5 as $view){
                    extract($view);
                    $linkctsp="index.php?act=sanphamct&id=".$id;
                    $hinh=$img_path.$img;
                    echo '<div class="row mb10 top5">
                            <a href="'.$linkctsp.'">
                                <img src="'.$hinh.'" alt="">
                            </a>
                            <a href="'.$linkctsp.'">'.$name.'</a>
                        </div>';
                }
            
            
            ?>
            <!-- <div class="row mb10 top5">
                <img src="img/anubis 01.jpg" alt="">
                <a href="#">Áo Khoác Vải Dù 2 Lớp Chống Nắng Anubis</a>
            </div>
            <div class="row mb10 top5">
                <img src="img/anubis 02.jpg" alt="">
                <a href="#">Áo Thun Sweater Thấm Hút Co Giãn Anubis</a>
            </div>
            <div class="row mb10 top5">
                <img src="img/anubis 03.jpg" alt="">
                <a href="#">PKTT Nón Chống Nắng Anubis</a>
            </div>
            <div class="row mb10 top5">
                <img src="img/anubis 04.jpg" alt="">
                <a href="#">Áo Sơ Mi Vải Bamboo Kháng Khuẩn Anubis</a>
            </div>
            <div class="row mb10 top5">
                <img src="img/anubis 05.jpg" alt="">
                <a href="#">Quần Short Thần Cổ Đại Anubis Ver2</a>
            </div>   -->
        </div>
    </div>