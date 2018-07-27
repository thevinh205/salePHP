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
        <header>
            <div class="wrap">
                <div class="profile">
                    <a class="cart" href="/gio-hang"> 
                        <i class="icon-cart"></i> 
                        <span>Giỏ hàng<b class="num sh" style="visibility: visible;">2</b></span> 
                        <span class="total">Tiền hàng: 6.440.000₫</span> 
                    </a>
                    <div class="odhistory" id="odhistory">
                        <a class="his" href="/lich-su-mua-hang">Lịch sử mua hàng</a> 
                        <a class="save-product" href="/lich-su-mua-hang?v=wishlist"> Sản phẩm đã lưu <i>1</i> </a>
                    </div>
                </div>
            </div>
        </header>
        
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
        
        <section class="bg-orange">
            <div class="flashsale" id="flashsales-1">
                <h2>GIÁ SỐC MỖI GIỜ</h2>
                <div class="scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag" data-position="1" data-isch="false" data-take="16">
                    
                    <div class="owl-item active" style="width: 240px;">
                        <div class="fpro" data-id="111223">
                            <a href="/may-tinh-bang/huawei-mediapad-t3-10-2017" class="flimg"> 
                                <img class="lazy loaded" data-src="https://cdn.tgdd.vn/Products/Images/522/111223/huawei-mediapad-t3-10-2017-anhava-300x300.jpg" height="200" width="200" alt="Huawei MediaPad T3 10 (2017)" src="https://cdn.tgdd.vn/Products/Images/522/111223/huawei-mediapad-t3-10-2017-anhava-300x300.jpg" data-was-processed="true"/> 
                            </a>
                            <div class="info">
                                <a href="/may-tinh-bang/huawei-mediapad-t3-10-2017" title="Huawei MediaPad T3 10 (2017)" class="name">Huawei MediaPad T3 10 (2017)</a>
                                <div class="prices">
                                    <span class="new">3.690.000₫</span> 
                                    <span class="line">4.490.000₫</span> 
                                    <span class="discount">- 18%</span>
                                    <button class="buy" onclick="return buynow(111223,false,'Huawei MediaPad T3 10 (2017)','Máy tính bảng','Huawei',3690000.00,false,this,false)">Chọn mua</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
        <?php 
            include("footer.php");
        ?>
    </body>
</html>
