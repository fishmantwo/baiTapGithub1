
<style>
.cart table{
    width: 100%;
    border-collapse: collapse;
}
.cart table tr:nth-child(n+2):hover {
    background-color: #EEE;
    transition: background-color 0.2s ease-in-out; 
}
.cart table tr:nth-child(1){
    background-color: #ccc;
}
.cart table tr {
    border: 1px solid #ccc; 
    width: 100px;
}
.cart table tr th{
    height: 70px;
    font-size: 16px;
}
.cart table tr td{
    text-align: center;
}
.cart table tr:first-child {
    border-bottom: none; 
}
</style>
<div class="row mb">
    <?php
        foreach($loadbill as $bill){
            extract($bill);
        }
    
    ?>
    <div class="boxtrai mr">
        <!-- mã đơn hàng -->
        <div class="row mb">
            <div class="boxtitle">Mã đơn hàng</div>
            <div class="row boxcontent ">
               <li>Mã đơn hàng: <?=$id?></li>
               <li>Ngày đơn hàng: <?=$ngaydathang	?></li>
               <li>Tổng đơn hàng: <?=$total?></li>
               <li>Phương thức thanh toán: <?=$pttt?></li>
            </div>
        </div>
        <!--Thông tin đặt hàng -->
        <div class="row mb">
            <div class="boxtitle">Thông tin đặt hàng</div>
            <div class="row boxcontent ">
               <table>
                <tr>
                    <td>Người đặt hàng</td>
                    <td><?=$name?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?=$address?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$email?></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><?=$tel?></td>
                </tr>
               </table>
            </div>
        </div>
        <!-- Phương thức thanh toán -->
        <div class="row mb">
                <div class="boxtitle">Giỏ hàng</div>
                <div class="row boxcontent cart">
                <table>
                   
                <?php 
    global $img_path;
    $tong = 0;
    $i = 0;
    echo '<table>
            <tr>
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>';

    foreach ($loadcart as $cart) {
        $imgPath = trim($cart['img']); // Remove leading/trailing spaces from the image path
        $hinh = $img_path . $imgPath;
        $tong += $cart['thanhtien'];
        
        echo '<tr>
                <td> <img src="'.$hinh.'" alt="" height="100px"> </td>
                <td>' . $cart['name'] . '</td>
                <td>' . $cart['price'] . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>' . $cart['thanhtien'] . '</td>
            </tr>';
        $i++;
    }
    echo '<tr style="height: 60px;">
            <td colspan="4" style="text-align: start; font-size: 18px;">Tổng đơn hàng</td>
            <td style="text-align: center; font-size: 18px;">' . $tong . '</td>
        </tr>';
    echo '</table>';
?>

                    
                </table>
            </div>
            </div>
    </div>
    <div class="boxphai">
        <?php require_once "view/boxright.php";?>
    </div>
</div>