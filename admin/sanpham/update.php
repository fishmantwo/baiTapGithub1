<?php
// kiểm tra nó có phải là mảng không và niếu là mảng extract nó ra
    if(is_array($sanpham)){
        extract($sanpham);
    }
    $hinhpath = "../uploads/".$img;
        if(is_file($hinhpath)){
            $hinh = "<img src='".$hinhpath."' height='100'>";
        }else{
            $hinh="không phải là hình";
       }

?>
<div class="row">
            <div class="row mb frmtitle">
                <h1>CẬP NHẬT SẢN PHẨM</h1>
            </div>
            <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">  
            <input type="hidden" name="idsp" value="<?=$id?>">
                    <div class="row mb10">
                        Tên sản phẩm<br>
                        <input type="text" name="tensp" value="<?=$name?>">
                    </div>
                    
                    <div class="row mb10">  
                          Danh mục <br>
                    <select name="iddm">
                        
                        <?php
                            foreach($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                                if($iddm==$id){
                                     echo '<option value="'.$id.'" selected>'.$name.'</option>';
                                }else{
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                               
                            }
                        ?>
                        
                       </select>
                    </div>
                    
                    <div class="row mb10">
                        Giá<br>
                        <input type="text" name="giasp"  value="<?=$price?>">
                    </div>
                    <div class="row mb10">
                        Hình<br>
                        <input type="file" name="hinh" >
                        <?=$hinh?>
                    </div>
                    <div class="row mb10">
                        Mô tả<br>
                        <textarea name="mota" cols="30" rows="10"><?=$mota?></textarea>
                    </div>
                    <div class="row mb10">
                        
                        <input type="submit" name="capnha" value="Cập Nhật">
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh Sách"></a>
                    </div>
                    <?php
                    if (isset($thongbao)&&$thongbao!="") {
                        echo '<h1>'.$thongbao.'</h1>';
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>    