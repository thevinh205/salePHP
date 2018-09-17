<?php 
    include("config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/common.js"></script>
        <link rel="stylesheet" type="text/css" href="resources/css/index.css">
    </head>
    <body>
        
        
        <div class="search-menu orange">
            <div class="container">
                <form class="mainsearch" onsubmit="return submitSearch(this)">
                    <div class="pr">
                        <input type="search" name="key" placeholder="Bạn mua gì?" maxlength="50" onkeyup="SuggestSearch(this,-1)" onkeydown="clearDelaysuggest()" autocomplete="off"> 
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
                        <a class="cart" href="/gio-hang"> 
                            <i class="icon-cart"></i> 
                            <span>Giỏ hàng<b class="num sh" style="visibility: visible;">2</b></span> 
                            <span class="total">Tiền hàng: 6.440.000₫</span> 
                        </a>
                    </div>
                </div>
            </header>
        </div>
        
        <div class="big-campain">
            <div class="big-milks">
                <div class="bigcam-item">
                    <div class="bigcam-pro">
                        <div class="productcam">
                            <a href="/dau-an/dau-cooking-nakydaco-5l-t4"> 
                                <img src="https://cdn.tgdd.vn/Products/Images/2286/79970/dau-cooking-nakydaco-5l-t4-non.png" height="300" width="300" alt="Dầu ăn Nakydaco chai 5lít"/> 
                            </a>
                            <div class="name">Dầu ăn Nakydaco chai 5lít</div>
                            <div class="info">
                                <div class="prices">
                                    <span class="new">101.000₫</span> 
                                    <span class="line">138.000₫</span>
                                </div>
                                <button class="buy itembuy" onclick="return buynow(79970,false,'Dầu ăn Nakydaco chai 5lít','Dầu ăn','Nakydaco',101000.0,false,this,false)" data-code="9892840000010">Mua ngay</button>
                            </div>
                        </div>
                        
                        <div class="productcam">
                            <a href="/dau-an/dau-cooking-nakydaco-5l-t4"> 
                                <img src="https://cdn.tgdd.vn/Products/Images/2286/79970/dau-cooking-nakydaco-5l-t4-non.png" height="300" width="300" alt="Dầu ăn Nakydaco chai 5lít"/> 
                            </a>
                            <div class="name">Dầu ăn Nakydaco chai 5lít</div>
                            <div class="info">
                                <div class="prices">
                                    <span class="new">101.000₫</span> 
                                    <span class="line">138.000₫</span>
                                </div>
                                <button class="buy itembuy" onclick="return buynow(79970,false,'Dầu ăn Nakydaco chai 5lít','Dầu ăn','Nakydaco',101000.0,false,this,false)" data-code="9892840000010">Mua ngay</button>
                            </div>
                        </div>
                        
                        <div class="productcam">
                            <a href="/dau-an/dau-cooking-nakydaco-5l-t4"> 
                                <img src="https://cdn.tgdd.vn/Products/Images/2286/79970/dau-cooking-nakydaco-5l-t4-non.png" height="300" width="300" alt="Dầu ăn Nakydaco chai 5lít"/> 
                            </a>
                            <div class="name">Dầu ăn Nakydaco chai 5lít</div>
                            <div class="info">
                                <div class="prices">
                                    <span class="new">101.000₫</span> 
                                    <span class="line">138.000₫</span>
                                </div>
                                <button class="buy itembuy" onclick="return buynow(79970,false,'Dầu ăn Nakydaco chai 5lít','Dầu ăn','Nakydaco',101000.0,false,this,false)" data-code="9892840000010">Mua ngay</button>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
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
                                echo        "<a href='/may-tinh-bang/huawei-mediapad-t3-10-2017' class='flimg'>";
                                echo            "<img class='lazy loaded' alt='".$tv_2['name']."' src='resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' data-was-processed='true'/>";
                                echo        "</a>";
                                echo        "<div class='info'>";
                                echo            "<a href='/may-tinh-bang/huawei-mediapad-t3-10-2017' title='".$tv_2['name']."' class='name'>".$tv_2['name']."</a>";
                                echo            "<div class='prices'>";
                                echo                "<span class='new numbers'>".$tv_2['price_sell']."</span>₫";
//                                echo                "<span class='line'>4.490.000₫</span>";
//                                echo                "<span class='discount'>- 18%</span>";
                                echo                "<button class='buy' onclick='return buynow(111223,false,'Huawei MediaPad T3 10 (2017)','Máy tính bảng','Huawei',3690000.00,false,this,false)'>Chọn mua</button>";
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
