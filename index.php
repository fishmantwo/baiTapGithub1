<?php
session_start();
    require_once "model/pdo.php";
    require_once "model/danhmuc.php";
    require_once "model/sanpham.php";
    require_once "model/taikhoan.php";
    require_once "model/viewcart.php";
    require_once "view/header.php";
    require_once "globl.php";

    if(!isset($_SESSION['mycart'])){
        $_SESSION['mycart']=[];
    }

    $spnew =loadsp_all_home();
    $dsdm = loaddm_all();
    $luotxem_top5 = loadsp_all_home_top5();

    if(isset($_GET['act'])&&($_GET['act'])!=""){
        $act = $_GET['act'];
        switch ($act) {
            case 'gioithieu':
                require_once "view/gioithieu.php";
                break;
            case 'lienhe':
                require_once "view/lienhe.php";
                break;
            case 'sanphamct':
                if(isset($_GET['id'])&&($_GET['id'])>0){  
                    $id=$_GET['id'];                    
                    $onesp=loadsp_one($id);
                    extract($onesp);
                    $sanpham_cungloai= loadsp_one_sanpham_cungloai($id,$iddm);
                    require_once "view/sanphamct.php";
                }else{
                    require_once "view/home.php";
                }
                
                break; 
            case 'sanpham':
                if(isset($POST['kyw'])&&($POST['kyw'])>0){  
                    $kyw=$POST['kyw'];
                }else{
                    $kyw="";
                }
                if(isset($_GET['iddm'])&&($_GET['iddm'])>0){  
                    $iddm=$_GET['iddm'];                    
                   
                }else{
                    $iddm=0;
                }
                $dssp= loadsp_all($kyw, $iddm);
                $tendm=load_ten_dm($iddm);
                require_once "view/sanpham.php";
                
                break;   
            case 'dangky':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){ 
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];

                   $thongbao=  insert_taikhoan_batloi($email,$user,$pass);
                    
                }

                require_once "view/taikhoan/dangky.php";
                break;         
            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){ 
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $check_user =  check_user($user, $pass);

                    if(is_array($check_user)){
                        $_SESSION['user']=$check_user;
                        header('Location: index.php');
                    }else{
                        $thongbao="Tài khoản không tồn tại";
                    }
                   
                }

                require_once "view/taikhoan/dangky.php";
                break;  
            case 'edit_taikhoan':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){ 
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];                    
                    $id = $_POST['id'];

                    update_edit_taikhoan($id ,$user,$pass,$email,$address, $tel);
                    $_SESSION['user'] =  check_user($user, $pass);
                    header('Location: index.php?act=edit_taikhoan');
                }

                require_once "view/taikhoan/edit_taikhoan.php";
                break;  
            case 'quenmk':
                if(isset($_POST['gui'])&&($_POST['gui'])){ 
                    $email = $_POST['email'];

                    $check_emmail=check_email($email);
                    if(is_array($check_emmail)){
                        $thongbaomk= "Mật khẩu của bạn là: ".$check_emmail['pass'];
                    }else{
                        $thongbaomk= "Email này không tồn tại (╥﹏╥)";
                    }
                    
                }

                require_once "view/taikhoan/quenmk.php";
                break;  
            case 'thoat':
                session_unset();
                header('Location: index.php');

                break;  
            case 'addtocart':
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])){ 
                    $id=$_POST['id'];
                    $name=$_POST['name'];
                    $img=$_POST['img'];
                    $price=$_POST['price'];
                    $soluong=1;
                    $thanhtien= $soluong*$price;

                    $sanPhamAdd=[$id,$name,$img,$price,$soluong,$thanhtien];
                    array_push($_SESSION['mycart'],$sanPhamAdd );
                }
                require_once "view/cart/viewcart.php";
                break;   
            case 'delcart':
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['mycart'],$_GET['idcart'],1);
                }else{
                    $_SESSION['mycart']=[];
                }
                header('location: index.php?act=viewcart');
                break;     
            case 'viewcart':
                require_once "view/cart/viewcart.php";
                break;   
            case 'billcomfirm':
                if(isset($_POST['dathang'])&&($_POST['dathang'])){ 
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $tel=$_POST['tel'];
                    $address=$_POST['address'];
                    $pttt=$_POST['pttt'];
                    $ngayDatHang=date('h:i:sa d/m/y');
                    $tongDonHang=tongDonHang();

                    $idbill=insert_bil($name,$email, $address,$tel,$pttt,$ngayDatHang, $tongDonHang);
                    
                    foreach ($_SESSION['mycart'] as $cart){
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2],$cart[1], $cart[3], $cart[4], $cart[5],$idbill);
                    }
                    $_SESSION['cart']=[];
                }
                    $loadbill=load_all_bill($idbill);
                    $loadcart=load_all_cart($idbill);
                require_once "view/cart/billcomfirm.php";
                break;
            case 'bill':
                require_once "view/cart/bill.php";
                break;  
            default:
                 require_once "view/home.php";
                break;  
        }
    }else{
        require_once "view/home.php";
    }
   
    require_once "view/footer.php";
?>