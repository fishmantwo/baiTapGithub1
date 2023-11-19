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
                        <th>Stt</th>
                        <th>Loại hàng</th>
                        <th>Số lượng</th>
                        <th>Giá trị cao nhất</th>
                        <th>Giá trị thất nhất</th>
                        <th>Giá trị trung bình</th>    
                    </tr>
                    
                    <?php
                        foreach ($listThongKe as $tk){
                            extract($tk);
                            echo '<tr>
                                    <td>'.$iddm.'</td>
                                    <td>'.$tendanhmuc.'</td>
                                    <td>'.$countsp.'</td>
                                    <td>'.$minprice.'</td>
                                    <td>'.$maxprice.'</td>
                                    <td>'.$avgprice.'</td>
                                </tr>';
                        }
                    
                    ?>

        
                </table>
            </div>
            <div class="row mb10">
                <a href="index.php?act=bieudo"><input type="button" value=" Xem biểu đồ "></a>
            </div>

    </div>
</div>
