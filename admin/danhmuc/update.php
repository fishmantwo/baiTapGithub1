<?php
// kiểm tra nó có phải là mảng không và niếu là mảng extract nó ra
    if(is_array($dm)){
        extract($dm);
    }

?>
<div class="row">
            <div class="row mb frmtitle">
                <h1>CẬP NHẬT LOẠI HÀNG</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=updatedm" method="post">  
                    <div class="row mb10">
                        Mã loại<br>
                        <input type="text" name="maloai" id="" disabled>
                    </div>
                    <div class="row mb10">
                        Tên loại<br>
                        <!-- hiện thị dự liệu mà mình muốn sữa -->
                        <input type="text" name="tenloai" value="<?php if(isset($name)&&($name)!=""){ echo $name;}  ?>">
                    </div>
                    <div class="row mb10">
                        <!-- cập nhật theo cái id này -->
                        <input type="hidden" name="id" value="<?php if(isset($id)&&($id)>0){ echo $id;}  ?>">
                        <input type="submit" name="capnhat" value="Cập Nhật">
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=lisdm"><input type="button" value="Danh Sách"></a>
                    </div>
                    <!-- hiện thị thông báo đã thêm mới thành công -->
                    <?php
                    if (isset($thongbao)&&$thongbao!="") {
                        echo '<h1>'.$thongbao.'</h1>';
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>    