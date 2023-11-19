<div class="row">
            <div class="row mb frmtitle">
                <h1>THÊM LOẠI HÀNG MỚI</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=adddm" method="post">  
                    <div class="row mb10">
                        Mã loại<br>
                        <input type="text" name="maloai" id="" disabled>
                    </div>
                    <div class="row mb10">
                        Tên loại<br>
                        <input type="text" name="tenloai">
                    </div>
                    <div class="row mb10">
                        <input type="submit" name="themmoi" value="Thêm Mới">
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=lisdm"><input type="button" value="Danh Sách"></a>
                    </div>
                    <?php
                    if (isset($thongbao)&&$thongbao!="") {
                        echo '<h1 style="color:red;">'.$thongbao.'</h1>';
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>    