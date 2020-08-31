<html>
	<head>
        <title>Sản phẩm khuyến mãi</title>
    </head>
    <body>
        <?php 
		    include("header.php");
			include("../config.php");
		?>
        
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

            <!-- Slides Container -->
            <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1200px; height: 442px;
            overflow: hidden;">
                <div>
                    <img data-u="image" src="../resources/img/banner/1.jpg" />
                </div>
                <div>
                    <img data-u="image" src="../resources/img/banner/2.jpg" />
                </div>
                <div>
                    <img data-u="image" src="../resources/img/banner/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="../resources/img/banner/4.jpg" />
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
        
    <div id="listProduct">
        <?php
            echo "<section class='bg-orange'>";
                echo    "<div class='flashsale' id='flashsales-1'>";
                echo        "<h2 style='text-transform: uppercase;'>SẢN PHẨM ĐANG KHUYẾN MÃI</h2>";
                echo        "<div class='scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag' data-position='1' data-isch='false' data-take='16'>";
                             $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee, p.prom, p.price_prom FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.prom;";
                            $result=mysqli_query($con,$sql);

                             while($tv_2=mysqli_fetch_array($result)) {
								$link = str_replace("_","-",$tv_2['id']);
                                echo "<div class='owl-item active' style='width: 100%; height: 1200px; border: 1px solid #fe7500;'>";
                                echo    "<div class='fpro' data-id='111223'>";
                                echo        "<input type='hidden' class='product-id' value='".$tv_2['id']."'/>"; 
                                echo        "<a href='$link' class='flimg'>";
                                echo            "<img class='lazy loaded' alt='".$tv_2['name']."' src='../resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' data-was-processed='true'/>";
                                echo        "</a>";
                                echo        "<div class='info'>";
                                echo            "<a href='$link' title='".$tv_2['name']."' class='name'>".$tv_2['name']."</a>";
                                echo            "<div class='prices'>";
                                if($tv_2['prom']) {
                                    $rateProm = round(($tv_2['price_sell'] - $tv_2['price_prom'])/$tv_2['price_sell'] * 100);
                                    echo                "<span class='new'><span class='numbers'>".$tv_2['price_prom']."</span>₫</span>";
                                    echo                "<span class='line'><span class='numbers'>".$tv_2['price_sell']."</span>₫</span>";
                                    echo                "<span class='discount'>- ".$rateProm."%</span>";
                                } else {
                                    echo                "<span class='new'><span class='numbers'>".$tv_2['price_sell']."</span>₫</span>";
                                }
                                echo                "<button class='buy add-to-cart' onclick='return buynow(111223,false,'Huawei MediaPad T3 10 (2017)','Máy tính bảng','Huawei',3690000.00,false,this,false)'>Thêm vào giỏ hàng</button>";
                                echo            "</div>";
                                echo        "</div>";
                                echo    "</div>";
                                echo "</div>";
                            }

                echo        "</div>";
                echo    "</div>";
                echo "</section>";  
            
        ?>
    </div>
        <?php 
            include("footer.php");
			$con->close();
        ?>
    
<!--        <script type="text/javascript">
            function add_chatinline(){var hccid=82244800;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}add_chatinline(); 
        </script>-->
    </body>
</html>
