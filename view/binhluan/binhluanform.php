<?php
    session_start();
    require_once "../../model/pdo.php";
    require_once "../../model/binhluan.php";
    $idpro = $_REQUEST['idpro'];
    $danhSachBL=loaddm_all_binhluan($idpro);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .binhluan table {
            border-collapse: separate;
            border-spacing: 10px; /* Chia điều khoảng cách giữa các ô */
            width: 100%;
            padding: 10px;
        }
        
        .binhluan table td:nth-child(1){
            width: 50%;
        }
        .binhluan table td:nth-child(2){
            width: 20%;
        }
        .binhluan table td:nth-child(3){
            width: 30%;
        }
    </style>
</head>
<body>

<div class="row mb">
        <div class="boxtitle">BÌNH LUẬN</div>
            <div class="boxcontent2 binhluan">
                <table>
                    <?php
                    // echo 'Đây là id của sản phẩm :'.$idpro; 
                        foreach($danhSachBL as $bl){
                            extract($bl);
                            $linkdm="index.php?act=sanpham&iddm=".$id;
                            echo '<tr><td>'.$noidung.'</td>';
                            echo '<td>'.$iduser.'</td>';
                            echo '<td>'.$ngaybinhluan.'</td></tr>';
                        }                    
                    ?>
                    
                </table>  
                
            </div>
        <div class="boxfooter searchbox"> 
            
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
             <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input type="text" name="noidung">
                <input type="submit" name="guibl" value="GỬI">
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['guibl'])&&($_POST['guibl'])){
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('h:i:sa d/m/Y');
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("location: ".$_SERVER['HTTP_REFERER']);
        }
    
    ?>
    
</body>
</html>    