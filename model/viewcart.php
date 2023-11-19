<?php
function viewcart_bill($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoa_th = '<th>Thao tác</th>';
        $xoa_td ='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a></td>';    
    }else{
        $xoa_th='';
        $xoa_td='';
    }
    echo ' <tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            '.$xoa_th.'
        </tr>';
    foreach($_SESSION['mycart'] as $cart){
        $hinh=$img_path.$cart[2];
        $thanhtien=$cart[3]*$cart[4];
        $tong+=$thanhtien;
        // $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
        echo '
           
            <tr>
                <td> <img src="'.$hinh.'" alt="" height="100px"> </td>
                <td>'.$cart[1].'</td>
                <td>'.$cart[3].'</td>
                <td>'.$cart[4].'</td>
                <td>'.$thanhtien.'</td>
                '.$xoa_td.'
            </tr>                           
        ';
        $i+=1;
    }
    echo '<tr style="height: 60px"">
        <td colspan="4" style="text-align: start; font-size: 18px;">Tổng đơn hàng</td>
        <td style="text-align: center; font-size: 18px;">'.$tong.'</td>
        <td></td>
    </tr>';
}

function tongDonHang(){  
    $tong=0;
    foreach($_SESSION['mycart'] as $cart){
        $thanhtien=$cart[3]*$cart[4];
        $tong+=$thanhtien;
       
    }
    return $tong;
}
    function insert_bil($name,$email, $address,$tel,$pttt,$ngayDatHang, $tongDonHang) {
        $sql = "INSERT INTO bill( name, email,address,tel,pttt,ngaydathang,total) 
        VALUES ('$name','$email',' $address','$tel','$pttt','$ngayDatHang', '$tongDonHang')";
        return pdo_execute_return_lastInsertId($sql);
    }
    function insert_cart($iduser,$idpro, $img,$name,$price,$soluong, $thanhtien, $idbill ) {
        $sql = "INSERT INTO cart( iduser,idpro, img,name,price,soluong, thanhtien, idbill ) 
        VALUES ('$iduser','$idpro',' $img','$name','$price','$soluong', '$thanhtien', '$idbill' )";
        return pdo_execute_return_lastInsertId($sql);
    }
    function load_all_bill($idbill) {
        $sql = "SELECT * FROM bill where id=".$idbill;
        $bill =pdo_query($sql);
        return $bill;
    }
    function load_all_cart($idbill) {
        $sql = "SELECT * FROM cart where idbill=".$idbill;
        $bill =pdo_query($sql);
        return $bill;
    }
    function load_all_count($idbill){
        $sql="SELECT * FROM cart WHERE idbill=".$idbill;
        $bill=pdo_query($sql);
        return sizeof($bill);
    }
   function load_all_bill_admin($kyw, $iduser){
    $sql = "SELECT * FROM bill where 1";
    if($iduser>0){
        $sql .= " AND iduser=".$iduser;
    }
    if($kyw!=""){
        $sql .= " AND id like '%".$kyw."%'";
    }
    $sql.= " ORDER BY  id desc";
    $bill = pdo_query($sql);
    return $bill;
   }
   function get_ttdh($n){
    switch ($n) {
        case '0':
            $tt="Đơn hàng mới";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao";
            break;
        case '3':
            $tt="Hoàn tất";
            break;
        default:
        $tt="Đơn hàng mới";
            break;
    }
    return $tt;
   }
   function detele_bill($id) {
        $sql = "DELETE FROM bill WHERE id=".$id;
        pdo_execute($sql);
    }
function loadalll_thongke(){
    $sql="SELECT danhmuc.id as iddm, danhmuc.name as tendanhmuc, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice  ";
    $sql .= " FROM sanpham left join danhmuc on danhmuc.id=sanpham.iddm ";
    $sql .= " GROUP BY danhmuc.id ORDER BY danhmuc.id desc";
    $listtk=pdo_query($sql);
    return $listtk;
}
?>