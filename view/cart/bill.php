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
.billform table{
    width: 100%;
}
.billform table tr td:nth-child(1){
    width: 20%;
}
</style>
<div class="row mb">
    <div class="boxtrai mr">
        <form action="index.php?act=billcomfirm" method="post">
            <!-- giỏ hàng -->
            <div class="row mb">
                <div class="boxtitle">Giỏ hàng</div>
                <div class="row boxcontent billform">
                    <table>
                        <?php
                            if(isset($_SESSION['user'])){
                                $name=$_SESSION['user']['user'];
                                $address=$_SESSION['user']['address'];
                                $email=$_SESSION['user']['email'];
                                $tel=$_SESSION['user']['tel'];
                            }else{
                                $name="";
                                $address="";
                                $email="";
                                $tel="";
                            }
                        ?>
                        <tr>
                            <td>Người đặt hàng</td>
                            <td><input type="text" name="name" id="" value="<?=$name?>" ></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="address" id="" value="<?=$address?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" id="" value="<?=$email?>"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="tel" id="" value="<?=$tel?>"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- Phương thức đặt hàng-->
            <div class="row mb">
                <div class="boxtitle">Phương thức đặt hàng</div>
                <div class="row boxcontent">
                    <table>
                        <tr>
                            <td><input type="radio" name="pttt" id="" checked> Trả tiền khi nhận hàng</td>
                            <td><input type="radio" name="pttt" id="" >Chuyển khoản ngân hàng</td>
                            <td><input type="radio" name="pttt" id="" > Thanh toán online</td>
                            
                        </tr>
                       
                    </table>
                </div>
            </div>
            <!-- thông tin giỏ hàng -->
            <div class="row mb">
                <div class="boxtitle">Giỏ hàng</div>
                <div class="row boxcontent cart">
                <table>
                   
                    <?php viewcart_bill(0);?>
                    
                </table>
            </div>
            </div>
            <div class="row mb bill">
                <input type="submit" value="Đặt Hàng" name="dathang">
            </div>
        </form>
    </div>
    <div class="boxphai">
        <?php require_once "view/boxright.php";?>
    </div>
</div>