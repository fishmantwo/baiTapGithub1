<div class="row">
    <div class="row mb frmtitle">
        <h1>DANH SÁCH LOẠI HÀNG</h1>
    </div>
    <form action="index.php?act=listsp" method="post">
        <input type="text" name="kyw">
        <select name="iddm">
            <option value="0">Tất Cả</option>
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
        <input type="submit" name="listok" value="OK">
    </form>
    <div class="row frmcontent">
        <form action="index.php?act=xoaCheckboxSp" method="post">
            <div class="row mb10 frmDSloai">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã Loại</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình</th>
                        <th>Giá</th>
                        <th>Lượt xem</th>
                        <th></th>
                    </tr>
                    <?php
                                foreach($listsanpham as $sanpham){
                                    extract($sanpham);
                                    $xoasp = "index.php?act=xoasp&id=".$id;
                                    $suasp = "index.php?act=suasp&id=".$id;
                                    $hinhpath = "../uploads/".$img;
                                    if(is_file($hinhpath)){
                                        $hinh = "<img src='".$hinhpath."' height='100'>";
                                    }else{
                                        $hinh="không phải là hình";
                                    }
                                    echo 
                                    '
                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" value="'.$id.'" id="checkbox1"></td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td>'.$hinh.'</td>
                                        <td>'.$price.'</td>
                                        <td>'.$luotxem.'</td>
                                        <td style="display: flex; justify-content: space-around; align-items: center; height: 125px; "> <a href="'.$suasp.'"><input type="button" value="Sửa"></a> <a href="'.$xoasp.'"><input type="button" value="Xóa"></a> </td>
                                    </tr>
                                    ';
                                }
                            ?>
                </table>
            </div>
            <div class="row mb10">
                <input type="button" value="Chọn tất cả" id="chonAll" onclick="toggleCheckboxes();">
                <input type="submit" value="Xóa Các Mục Đã Chọn" name="xoaMucDaChon" >
                <a href="index.php?act=adddm"><input type="button" value="Danh Sách"></a>
            </div>
        </form>

    </div>
</div>
<script>
    function toggleCheckboxes() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var selectAllButton = document.getElementById('chonAll');
        
        // Kiểm tra xem có ít nhất một ô checkbox chưa được chọn
        var isAtLeastOneUnchecked = Array.from(checkboxes).some(function(checkbox) {
            return !checkbox.checked;
        });

        // Nếu có ít nhất một ô checkbox chưa được chọn, chọn tất cả
        if (isAtLeastOneUnchecked) {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
            selectAllButton.value = "Bỏ chọn tất cả";
        } else {
            // Ngược lại, bỏ chọn tất cả
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
            selectAllButton.value = "Chọn tất cả";
        }
    }
</script>