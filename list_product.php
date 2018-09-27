<?php 
    include("config.php");
?>
<html>
    <head>
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/common.js"></script>
        <link rel="stylesheet" type="text/css" href="resources/css/index.css">
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/docs.min.js"></script>
        <script src="resources/js/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript" src="resources/js/jssor.slider.min.js"></script>
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    </head>
    <body>

       
        
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
        
        //<?php
            
            $sql1="SELECT pt.type_id, pt.type_name FROM product_type pt where pt.type_id in ('loa', 'loa_bluetooth', 'micro_kara', 'camera', 'massage', 'duphong', 'tainghe') order by pt.index;";
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
                                echo            "<a href='detail.php?product_id=".$tv_2['id']."' title='".$tv_2['name']."' class='name'>".$tv_2['name']."</a>";
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
    
    //<?php
//            
//    
//        echo    "<div class='flashsale' id='flashsales-1'>";
//        echo        "<h2 style='text-transform: uppercase;'>Loa vi tính</h2>";
//        echo        "<div class='scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag' data-position='1' data-isch='false' data-take='16'>";
//                    $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.product_type='loa';";
//                    $result=mysqli_query($con,$sql);
//
//                     while($tv_2=mysqli_fetch_array($result)) {
//                        echo "<div class='owl-item active' style='width: 240px; height: 300px;'>";
//                        echo    "<div class='fpro' data-id='111223'>";
//                        echo        "<input type='hidden' class='product-id' value='".$tv_2['id']."'/>"; 
//                        echo        "<a href='detail.php?product_id=".$tv_2['id']."' class='flimg'>";
//                        echo            "<img class='lazy loaded' alt='".$tv_2['name']."' src='resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' data-was-processed='true'/>";
//                        echo        "</a>";
//                        echo        "<div class='info'>";
//                        echo            "<a href='detail.php?product_id=".$tv_2['id']."' title='".$tv_2['name']."' class='name'>".$tv_2['name']."</a>";
//                        echo            "<div class='prices'>";
//                        echo                "<span class='new numbers'>".$tv_2['price_sell']."</span>₫";
////                                echo                "<span class='line'>4.490.000₫</span>";
////                                echo                "<span class='discount'>- 18%</span>";
//                        echo                "<button class='buy add-to-cart' onclick='return buynow(111223,false,'Huawei MediaPad T3 10 (2017)','Máy tính bảng','Huawei',3690000.00,false,this,false)'>Thêm vào giỏ hàng</button>";
//                        echo            "</div>";
//                        echo        "</div>";
//                        echo    "</div>";
//                        echo "</div>";
//                    }
//
//        echo        "</div>";
//        echo    "</div>";
//           
//        ?>
    </body>
</html>
