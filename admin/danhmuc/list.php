<div class="row">
            <div class="row mb frmtitle">
                <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>
            <div class="row frmcontent">
                <form action="index.php?act=xoaCheckbox" method="post">  
                    <div class="row mb10 frmDSloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>Mã Loại</th>
                                <th>Tên Loại</th>
                                <th></th>
                            </tr>
                            <?php
                            
                                foreach($listdanhmuc as $danhmuc){
                                    extract($danhmuc);
                                    $xoadm = "index.php?act=xoadm&id=".$id;
                                    $suadm = "index.php?act=suadm&id=".$id;
                                    echo 
                                    '
                                    <tr>
                                        <td><input type="checkbox" name="checkbox[]" value="'.$id.'" id="checkbox1"></td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                        <td style="display: flex; justify-content: space-around;"> <a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a> </td>
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