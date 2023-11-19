<div class="row">
            <div class="row mb frmtitle">
                <h1>THÊM MỚI SẢN PHẨM</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">  
                    <div class="row mb10">
                        Danh mục<br>
                       <select name="iddm">
                        <?php
                            foreach($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                                echo
                                '
                                  <option value="'.$id.'">'.$name.'</option>
                                ';
                            }
                        
                        ?>
                        
                       </select>
                     
                    </div>
                    <div class="row mb10">
                        Tên sản phẩm<br>
                        <input type="text" name="tensp">
                    </div>
                    <div class="row mb10">
                        Giá<br>
                        <input type="text" name="giasp">
                    </div>
                    <div class="row mb10">
                        Hình<br>
                        <input type="file" name="hinh">
                    </div>
                    <div class="row mb10">
                        Mô tả<br>
                        <textarea name="mota" cols="30" rows="10"></textarea>
                    </div>
                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="Thêm Mới">
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