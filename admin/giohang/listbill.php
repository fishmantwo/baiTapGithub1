<style>
    .thaotac{
        display: flex;
        justify-content: space-around;
        height: 92px;
    }
</style>
<div class="row">
    <div class="row mb frmtitle">
        <h1>DANH SÁCH LOẠI HÀNG</h1>
    </div>
    <form action="index.php?act=dsdh" method="post">
        <input type="text" name="kyw" placeholder="Nhập mã đơn hàng để tìm">
        <input type="submit" value="Go" name="listOk">
    </form>
    <div class="row frmcontent">
            <div class="row mb10 frmDSloai">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã đơn hàng</th>
                        <th>khách hàng</th>
                        <th>Số lượng hàng</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Thao tác</th>
                        <th></th>
                    </tr>
                    <?php
                        foreach($listbill as $bill){
                            extract($bill);
                            $xoabill = "index.php?act=xoabill&id=".$id;
                            $khachHang=$name.'
                            <br> '.$email.'
                            <br> '.$address.'
                            <br> '.$tel.'
                            ';
                            $ttdh=get_ttdh($status);
                            $countsp=load_all_count($id);
                            echo 
                            '
                            <tr>
                                <td><input type="checkbox" name="checkbox[]" value="'.$id.'" id="checkbox1"></td>
                                <td>'.$id.'</td>
                                <td>'.$khachHang.'</td>
                                <td>'.$countsp.'</td>
                                <td>'.$total.'</td>
                                <td>'.$ttdh.'</td>
                                <td class="thaotac" > <a href="#"><input type="button" value="Sửa"></a> <a href="'.$xoabill.'"><input type="button" value="Xóa"></a> </td>
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