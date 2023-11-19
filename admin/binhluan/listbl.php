<div class="row">
            <div class="row mb frmtitle">
                <h1>DANH SÁCH KHÁCH HÀNG</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=xoaCheckboxBL" method="post">  
                    <div class="row mb10 frmDSloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>Mã Bình luận</th>
                                <th>Nội Dung</th>
                                <th>Tên user</th>
                                <th>Idpro</th>
                                <th>Ngày bình luận</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach($listBinhLuan as $bl){
                                    extract($bl);
                                    $xoal = "index.php?act=xoal&id=".$id;
                                    $suabl = "index.php?act=suabl&id=".$id;
                                    echo 
                                    '
                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" value="'.$id.'" id="checkbox1"></td>
                                        <td>'.$id.'</td>
                                        <td>'.$noidung.'</td>
                                        <td>'.$iduser.'</td>
                                        <td>'.$idpro.'</td>
                                        <td>'.$ngaybinhluan.'</td>
                                        <td style="display: flex; justify-content: space-around;"> <a href="'.$suabl.'"><input type="button" value="Sửa"></a> <a href="'.$xoal.'"><input type="button" value="Xóa"></a> </td>
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
        
<script src="../js/chonAll.js"></script>