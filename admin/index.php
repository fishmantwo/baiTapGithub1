<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/viewcart.php";
    include "header.php";
    if(isset($_GET['act'])&&($_GET['act'])!=""){
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                // kiểm tra nút submit
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai = $_POST["tenloai"];
                    $thongbao=insert_danhmuc($tenloai);
                  
                }
                require_once "danhmuc/add.php";
                break;
            case 'lisdm':
                $listdanhmuc = loaddm_all();
                require_once "danhmuc/list.php";
                break;
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $id = $_GET['id'];
                    detele_danhmuc($id);
                }
                $listdanhmuc = loaddm_all();
                require_once "danhmuc/list.php";
                break;
                case 'xoaCheckbox':
                    if (isset($_POST['xoaMucDaChon'])) {
                        
                        if (isset($_POST["checkbox"]) && is_array($_POST["checkbox"])) {     
                            // print_r($_POST['checkbox']);
                            foreach($_POST["checkbox"] as $xoaAll){
                                $sql = "DELETE FROM danhmuc WHERE id=".$xoaAll;
                                pdo_execute($sql);
                            }
                        }
                    }
                    $listdanhmuc = loaddm_all();
                     require_once "danhmuc/list.php";    
                    break;       
            case 'suadm':
                // kiểm có cái id ko và nó có lớn hơn không.
                // sau đó thực thi lấy dự liệu from danh mục,
                // có điều kiện là lấy theo id theo được tạo từ trước.
                // gán vào biến $dm,  'pdo_query_one($sql)' -> lấy cho tiết sản phẩm
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $id = $_GET['id'];
                    $dm = loaddm_one($id);
                }
                require_once "danhmuc/update.php";
                break;
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao= "bạn đã nhập thành công";
                }
                $listdanhmuc = loaddm_all();
                require_once "danhmuc/list.php";
                break;   

            // sản phẩm
            case 'addsp':
                // kiểm tra nút submit
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $gia=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    // lấy file hình
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                    // if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    //   } else {
                    //     echo "Sorry, there was an error uploading your file.";
                    //   }

                    insert_sanpham($tensp,$gia,$hinh,$mota,$iddm);
                    $thongbao= "bạn đã nhập thành công";
                }
                $listdanhmuc = loaddm_all();
                require_once "sanpham/add.php";
                break;
            case 'listsp':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw=$_POST['kyw'];
                    $iddm=$_POST['iddm'];
                }else{
                    $kyw='';
                    $iddm=0;
                }
                $listdanhmuc = loaddm_all();
                $listsanpham = loadsp_all($kyw,$iddm);
                require_once "sanpham/list.php";
                break;
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $id = $_GET['id'];
                    detele_sanpham($id);
                }
                $listsanpham = loadsp_all("",0);
                require_once "sanpham/list.php";
                break;
            case 'xoaCheckboxSp':
                if (isset($_POST['xoaMucDaChon'])) {
                        
                    if (isset($_POST["checkbox"]) && is_array($_POST["checkbox"])) {     
                        // print_r($_POST['checkbox']);
                        foreach($_POST["checkbox"] as $xoaAll){
                            detele_sanpham($xoaAll);
                        }
                    }
                }
                $listsanpham = loadsp_all("",0);
                require_once "sanpham/list.php";
                break;

           
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $id = $_GET['id'];
                    $sanpham = loadsp_one($id);
                }
                $listdanhmuc = loaddm_all();
                require_once "sanpham/update.php";
                break;
            case 'updatesp':
                if(isset($_POST['capnha'])&&($_POST['capnha'])){
                    $id=$_POST['idsp'];
                    $iddm=$_POST['iddm'];
                    $tensp=$_POST['tensp'];
                    $gia=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    // lấy file hình
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                      } else {
                        // echo "Sorry, there was an error uploading your file.";
                      }

                    update_sanpham($id,$iddm,$tensp,$gia,$hinh,$mota);
                    $thongbao= "bạn đã nhập thành công";
                    
                }
                $listdanhmuc = loaddm_all();
                $listsanpham = loadsp_all("",0);
                require_once "sanpham/list.php";
                break;     
            case 'dskh':
                $listtaikhoan = load_all_taikhoan();
                require_once "taikhoan/listTK.php";
                break;
            case 'xoatk':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $id = $_GET['id'];
                    detele_taikhoan($id);
                }
                $listtaikhoan = load_all_taikhoan();
                require_once "taikhoan/listTK.php";
                break;    
            case "dsbl":
                $listBinhLuan= loaddm_all_binhluan(0);
                require_once "binhluan/listbl.php";
                break;     
            case 'xoal':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $id = $_GET['id'];
                    detele_binhluan($id);
                }
                $listBinhLuan= loaddm_all_binhluan(0);
                require_once "binhluan/listbl.php";
                break;   
            case 'xoaCheckboxBL':
                if (isset($_POST['xoaMucDaChon'])) {
                        
                    if (isset($_POST["checkbox"]) && is_array($_POST["checkbox"])) {     
                        // print_r($_POST['checkbox']);
                        foreach($_POST["checkbox"] as $xoaAll){
                            detele_binhluan($xoaAll);
                        }
                    }
                }
                $listBinhLuan= loaddm_all_binhluan(0);
                require_once "binhluan/listbl.php";
                break;
            case 'dsdh':
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw=$_POST['kyw'];
                }else{
                    $kyw="";
                }
                $listbill= load_all_bill_admin($kyw,0);
                require_once "giohang/listbill.php";
                break;
            case 'xoabill':
                if(isset($_GET['id'])&&($_GET['id'])>0){
                    $id = $_GET['id'];
                    detele_bill($id);
                }
                $listbill= load_all_bill_admin("",0);
                require_once "giohang/listbill.php";
                break;
            case 'thongke':
                $listThongKe=loadalll_thongke();
                require_once "thongke/listThongKe.php";
                break;  
            case 'bieudo':
                $listThongKe=loadalll_thongke();
                require_once "thongke/bieudo.php";
                break; 
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";

    }
    
    include "footer.php";
?>