<div class="row">
            <div class="row mb frmtitle">
                <h1>DANH SÁCH KHÁCH HÀNG</h1>
            </div>
            <div class="row frmcontent">
                <form action="#" method="post">  
                    <div class="row mb10 frmDSloai">
                        <table>
                            <tr>
                                <th></th>
                                <th>Mã TK</th>
                                <th>Tên Đăng Nhập</th>
                                <th>Mật khẩu</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Điện Thoại</th>
                                <th>Vai Trò</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach($listtaikhoan as $taikhoan){
                                    extract($taikhoan);
                                    $xoatk = "index.php?act=xoatk&id=".$id;
                                    $suatk = "index.php?act=suatk&id=".$id;
                                    echo 
                                    '
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>'.$id.'</td>
                                        <td>'.$user.'</td>
                                        <td>'.$pass.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$address.'</td>
                                        <td>'.$tel.'</td>
                                        <td>'.$role.'</td>
                                        <td style="display: flex; justify-content: space-around;"> <a href="'.$suatk.'"><input type="button" value="Sửa"></a> <a href="'.$xoatk.'"><input type="button" value="Xóa"></a> </td>
                                    </tr>
                                    ';
                                }
                            ?>
                        </table>
                    </div>
                    <div class="row mb10">
                        <input type="button" value="Chọn tất cả">
                        <input type="button" value="Bỏ chọn tất cả">
                        <input type="button" value="Xóa Các Mục Đã Chọn">
                        <a href="index.php?act=adddm"><input type="button" value="Danh Sách"></a>
                    </div>
                </form>

            </div>
        </div>