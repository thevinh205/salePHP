<?php 
    include("config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/common.js"></script>
        <link rel="stylesheet" type="text/css" href="resources/css/index.css">
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="resources/js/ie10-viewport-bug-workaround.js"></script>
        <!-- jssor slider scripts-->
        <script type="text/javascript" src="resources/js/jssor.slider.min.js"></script>
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    </head>
    <body>
        
        
        <div class="search-menu orange">
            <div class="container1">
                <form class="mainsearch" onsubmit="return submitSearch(this)">
                    <div class="pr">
                        <input type="text" name="key" placeholder="Bạn mua gì?" maxlength="50"> 
                        <button type="submit" class="btnsearch"><i class="icon-search"></i></button> 
                        <span id="searchclear" class="searchclear"><i class="icon-searchclr"></i></span>
                    </div>
                </form>
<!--                <div class="hotline">
                    <img src="//cdn.tgdd.vn/vuivui/www/Content/images/desktop/delivery-motorbike.png">
                    <a href="https://vieclam.thegioididong.com/tuyen-dung/giao-hang-xe-may.html" target="_blank"> Cần 500 anh em Giao hàng xe máy. Ứng tuyển ngay TẠI ĐÂY »</a>
                </div>-->
                <div class="clr"></div>    
            </div>   
            
            <header>
                <div class="wrap">
                    <div class="profile">
                        <a class="cart" href="order.php"> 
                            <i class="icon-cart"></i> 
                            <span>Giỏ hàng
                                <?php
                                    session_start();
                                    $countInCart = 0;
                                    foreach($_SESSION['cart'] as $id => $value) { 
                                        if($id != '')
                                            $countInCart += $value;
                                    } 
                                    echo "<b class='num sh shopping-cart' style='visibility: visible;'>".$countInCart."</b>";
                                ?>
                            </span> 
<!--                            <span class="total">Tiền hàng: 6.440.000₫</span> -->
                        </a>
                    </div>
                </div>
            </header>
        </div>
        
        
        
        <div class="container">
        <!-- Jssor Slider Begin -->

        <style>
            /* jssor slider loading skin spin css */
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }
        </style>

        <div id="slider1_container" class="slider_container">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
            </div>

            <!-- Slides Container -->
            <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1200px; height: 442px;
            overflow: hidden;">
                <div>
                    <img data-u="image" src="resources/img/banner/1.png" />
                </div>
                <div>
                    <img data-u="image" src="resources/img/banner/2.jpg" />
                </div>
                <div>
                    <img data-u="image" src="resources/img/banner/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="resources/img/banner/4.jpg" />
                </div>
            </div>
            
            <!--#region Bullet Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
            <style>
                .jssorb031 {position:absolute;}
                .jssorb031 .i {position:absolute;cursor:pointer;}
                .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
                .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
                .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
                .jssorb031 .i.idn {opacity:.3;}
            </style>
            <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!--#endregion Bullet Navigator Skin End -->
        
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
            <style>
                .jssora051 {display:block;position:absolute;cursor:pointer;}
                .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
                .jssora051:hover {opacity:.8;}
                .jssora051.jssora051dn {opacity:.5;}
                .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
            </style>
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
            <!--#endregion Arrow Navigator Skin End -->
        </div>
        <!-- Jssor Slider End -->
    </div>
        
        <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: 1,                                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: 5000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: 1,   			                //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                $SlideEasing: $Jease$.$OutQuint,                    //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $SpacingX: 12,                                  //[Optional] Horizontal space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth - 0);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
        
        <?php
            $sql1="SELECT pt.type_id, pt.type_name FROM sale.product_type pt where pt.type_id in ('loa', 'loa_bluetooth', 'micro_kara', 'camera', 'massage', 'duphong', 'tainghe') order by pt.index;";
            $result1=mysqli_query($con,$sql1);

             while($tv_1=mysqli_fetch_array($result1)) {
                echo "<section class='bg-orange'>";
                echo    "<div class='flashsale' id='flashsales-1'>";
                echo        "<h2 style='text-transform: uppercase;'>".$tv_1['type_name']."</h2>";
                echo        "<div class='scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag' data-position='1' data-isch='false' data-take='16'>";
                            $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.product_type='".$tv_1['type_id']."';";
                            $result=mysqli_query($con,$sql);

                             while($tv_2=mysqli_fetch_array($result)) {
                                echo "<div class='owl-item active' style='width: 240px; height: 300px;'>";
                                echo    "<div class='fpro' data-id='111223'>";
                                echo        "<input type='hidden' class='product-id' value='".$tv_2['id']."'/>"; 
                                echo        "<a href='detail.php?product_id=".$tv_2['id']."' class='flimg'>";
                                echo            "<img class='lazy loaded' alt='".$tv_2['name']."' src='resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' data-was-processed='true'/>";
                                echo        "</a>";
                                echo        "<div class='info'>";
                                echo            "<a href='/may-tinh-bang/huawei-mediapad-t3-10-2017' title='".$tv_2['name']."' class='name'>".$tv_2['name']."</a>";
                                echo            "<div class='prices'>";
                                echo                "<span class='new numbers'>".$tv_2['price_sell']."</span>₫";
//                                echo                "<span class='line'>4.490.000₫</span>";
//                                echo                "<span class='discount'>- 18%</span>";
                                echo                "<button class='buy add-to-cart' onclick='return buynow(111223,false,'Huawei MediaPad T3 10 (2017)','Máy tính bảng','Huawei',3690000.00,false,this,false)'>Thêm vào giỏ hàng</button>";
                                echo            "</div>";
                                echo        "</div>";
                                echo    "</div>";
                                echo "</div>";
                            }

                echo        "</div>";
                echo    "</div>";
                echo "</section>";
                         
             }
        ?>
        
        <?php 
            include("footer.php");
        ?>
    </body>
</html>
