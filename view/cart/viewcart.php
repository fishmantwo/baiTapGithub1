
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
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">Giỏ hàng</div>
            <div class="row boxcontent cart">
                <table>
                   
                    <?php
                        viewcart_bill(1);
                    ?>
                    
                    <!-- <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr> -->
                </table>
            </div>
        </div>
        <div class="row mb bill">
            <a href="index.php?act=bill">
                <input type="button" value="Đồng ý đặt hàng">
            </a>
            <a href="index.php?act=delcart">
                <input type="button" value="Xóa giỏ hàng">
            </a>
        </div>
    </div>
    <div class="boxphai">
        <?php require_once "view/boxright.php";?>
    </div>
</div>