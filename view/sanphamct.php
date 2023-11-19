<?php
    extract($onesp);
?>
<style>
    .spct {
        text-align: center;
    }
</style>
<div class="row mb">
    <!-- box ở bên trái -->
    <div class="boxtrai mr">

        <!-- sản phẩm chi tiết -->
        <div class="row mb">
            <div class="boxtitle"><?= $name ?></div>
            <div class="row boxcontent">
                <?php
                $hinh = $img_path . $img;
                echo '<div class="row mb spct"> <img src="' . $hinh . '" alt="" width="65%" height="auto"> </div>';
                echo $mota;
                ?>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
                });
            </script>
            <!-- bình luận -->
        </div>
        <div class="row " id="binhluan">
            
        </div>    
            <!-- sản phẩm cùng loại -->
        
        <div class="row mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="row boxcontent">
                <?php
                foreach ($sanpham_cungloai as $SPcungLoai) {
                    extract($SPcungLoai);
                    $linkctsp = "index.php?act=sanphamct&id=" . $id;
                    echo '<li><a href="' . $linkctsp . '">' . $name . '</a></li>';
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