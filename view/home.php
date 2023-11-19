 <style>
    .btnaddtocart{
        width: 100%;
        padding: 10px;
        /* text-align: center; */
    }
    .btnaddtocart input[type="submit"]{
        width: 60%;
        height: 35px;
        background-color: #fff;
        border-radius: 5px;
        transition: all 0.4s ease 0s;
        cursor: pointer;
    }
    .btnaddtocart input[type="submit"]:hover{
        background-color: #2EE59D;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: scale(0.9);
    }
 </style>
 <!-- banner -->
       <div class="row mb">

           <!-- box ở bên trái -->
           <div class="boxtrai mr">
               <div class="row">
                   <div class="banner">
                       <!-- Slideshow container -->
                       <div class="slideshow-container">

                           <!-- Full-width images with number and caption text -->
                           <div class="mySlides fade">
                               <!-- <div class="numbertext">1 / 3</div> -->
                               <img src="img/banner1.jpg" style="width:100%">
                               <div class="text">Caption Text</div>
                           </div>

                           <div class="mySlides fade">
                               <!-- <div class="numbertext">2 / 3</div> -->
                               <img src="img/banner2.jpg" style="width:100%">
                               <div class="text">Caption Two</div>
                           </div>

                           <div class="mySlides fade">
                               <!-- <div class="numbertext">3 / 3</div> -->
                               <img src="img/banner3.jpg" style="width:100%">
                               <div class="text">Caption Three</div>
                           </div>

                           <!-- Next and previous buttons -->
                           <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
                       </div>
                       <br>

                       <!-- The dots/circles -->
                       <div style="text-align:center">
                           <span class="dot" onclick="currentSlide(1)"></span>
                           <span class="dot" onclick="currentSlide(2)"></span>
                           <span class="dot" onclick="currentSlide(3)"></span>
                       </div>
                   </div>
               </div>

               <!-- sản phẩm -->
               <div class="row">

                   <?php
                    $i = 0;
                    foreach ($spnew as $sp) {
                        extract($sp);
                        $linkctsp = "index.php?act=sanphamct&id=".$id;
                        $hinh = $img_path.$img;
                        if (($i == 2) || ($i == 5) || ($i == 8)) {
                            $mr = "";
                        } else {
                            $mr = "mr";
                        }
                        echo '<div class="boxsp ' . $mr . '">
                            <div class="row img">
                            <a href="' . $linkctsp . '">
                                <img src="' . $hinh . '" alt="" width="60%" height="220px">
                            </a>    
                            </div>
                            <p>' . $price . '</p>
                            <a href="' . $linkctsp . '">' . $name . '</a>
                            <div class="row btnaddtocart">
                                <form action="index.php?act=addtocart" method="post">
                                    <input type="hidden" name="id" value="'.$id.'">
                                    <input type="hidden" name="name" value="'.$name.'">
                                    <input type="hidden" name="img" value="'.$img.'">
                                    <input type="hidden" name="price" value="'.$price.'">
                                    <input type="submit" name="addtocart" value="Mua ngay">
                                </form>
                            </div>
                        </div>';
                        $i += 1;
                    }
                    ?>
                   <!-- <div class="boxsp mr">
            <div class="row img">
                 <img src="img/sale 01 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$18</p>
            <a href="#">ÁO KHOẮC</a>
        </div>
        <div class="boxsp mr">
            <div class="row img">
                 <img src="img/sale 02 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$12</p>
            <a href="#">ÁO THUN</a>
        </div>
        <div class="boxsp">
            <div class="row img">
                 <img src="img/sale 03 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$10</p>
            <a href="#">ÁO THUN</a>
        </div>
        <div class="boxsp mr">
            <div class="row img">
                 <img src="img/sale 05 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$5</p>
            <a href="#">QUẦN THUN</a>
        </div>
        <div class="boxsp mr">
            <div class="row img">
                 <img src="img/SP moi 01 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$17</p>
            <a href="#">ÁO KHOẮC</a>
        </div>
        <div class="boxsp">
            <div class="row img">
                 <img src="img/SP moi 02 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$16</p>
            <a href="#">ÁO KHOẮC</a>
        </div>
        <div class="boxsp mr">
            <div class="row img">
                 <img src="img/SP moi 03 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$9</p>
            <a href="#">ÁO THUN</a>
        </div>
        <div class="boxsp mr">
            <div class="row img">
                 <img src="img/SP moi 06 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$11</p>
            <a href="#">ÁO KHOẮC</a>
        </div>
        <div class="boxsp">
            <div class="row img">
                 <img src="img/sale 06 hover.jpg" alt="" width="60%" height="220px">
            </div>
            <p>$11</p>
            <a href="#">ÁO THUN</a>
        </div>
         -->
               </div>
           </div>

           <!-- box ở bên phải -->
           <div class="boxphai">
                <?php
                    require_once "view/boxright.php";
                ?>

           </div>
       </div>