<style>
    .spct {
        text-align: center;
    }
</style>
<div class="row mb">
    <!-- box ở bên trái -->
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">SẢN PHẤM <strong><?=$tendm?></strong></div>
            <div class="row boxcontent">
                <?php
                    $i = 0;
                    foreach ($dssp as $sp) {
                        extract($sp);
                        $linkctsp = "index.php?act=sanphamct&id=".$id;
                        $hinh = $img_path . $img;
                        if (($i == 2) || ($i == 5) || ($i == 8)) {
                            $mr = "";
                        } else {
                            $mr = "mr";
                        }
                        echo '<div class="boxsp ' . $mr . '">
                            <div class="row img">
                            <a href="' . $linkctsp . '">
                                <img src="' . $hinh . '" alt="" width="60%" height="220px">
                            </a>    
                            </div>
                            <p>' . $price . '</p>
                            <a href="' . $linkctsp . '">' . $name . '</a>
                        </div>';
                        $i += 1;
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