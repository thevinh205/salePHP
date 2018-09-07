<?php 
    include("config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/common.js"></script>
        <link rel="stylesheet" type="text/css" href="resources/css/index.css">
        <link rel="stylesheet" type="text/css" href="resources/css/detail.css">
    </head>
    <body>
        <div class="search-menu orange">
            <div class="container">
                <form class="mainsearch" style="width: 350px">
                    <div class="pr">
                        <input type="text" name="key" placeholder="Bạn mua gì?" maxlength="50"> 
                        <button type="submit" class="btnsearch"><i class="icon-search"></i></button> 
                        <span id="searchclear" class="searchclear"><i class="icon-searchclr"></i></span>
                    </div>
                </form>

                <div class="mnu-ct">
                    <div class="item">
                        <a href="/dien-thoai-di-dong">Tai nghe</a>
                    </div>    
                    <div class="item">
                        <a href="/dien-thoai-di-dong">Loa vi tính</a>
                    </div>  
                    <div class="item">
                        <a href="/dien-thoai-di-dong">Loa blutooth</a>
                    </div>  
                    <div class="item">
                        <a href="/dien-thoai-di-dong">Mic hát karaoke</a>
                    </div>   
                    <div class="item">
                        <a href="/dien-thoai-di-dong">Massage</a>
                    </div> 
                </div>
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
        
        <div style="width: 100%; text-align: center; background-color: #fff; margin-top: 6px">
            <nav class="flex bread">
                <a href="/" class="navi item brdc">Trang chủ</a> 
                <a href="/khu-cong-nghe-dien-may" class="navi item brdc">Điện thoại, điện máy</a> 
                <a href="/dien-thoai-di-dong" class="navi item brdc">Điện thoại</a> 
            </nav>
        </div>
        
        <div class="mainctn">
            <div class="productinfo">
                <div class="gallery" data-id="112970" data-cate="42">
                    <div class="wrapslide">
                        <img onclick="OpenPhotoSwipe(0)" class="avatar" src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-hh-600x600-300x300.jpg" alt="" width="560" height="310">
                    </div>
                    <div class="colorandpic tele">
                        <ul>
                            <li class="gal">
                                <a href="javascript:" onclick="OpenPhotoSwipe(0)">
                                    <div>
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-vang-dong-1-2-180x120.jpg">
                                    </div>
                                </a>
                            </li>
                            <li class="gal">
                                <a href="javascript:" onclick="OpenPhotoSwipe(1)">
                                    <div>
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-vang-dong-2-2-180x120.jpg">
                                    </div>
                                </a>
                            </li>
                            <li class="gal">
                                <a href="javascript:" onclick="OpenPhotoSwipe(2)">
                                    <div>
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-vang-dong-3-2-180x120.jpg">
                                    </div>
                                </a>
                            </li>
                            <li class="gal">
                                <a href="javascript:" onclick="OpenPhotoSwipe(0)">
                                    <div>
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-vang-dong-2-2-180x120.jpg"> 
                                        <span class="imgcount">Xem<br>12 hình</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="info">
                    <h1 class="productname">Samsung Galaxy J7 Plus</h1>
                    <div class="boxprice">
                        <div class="prices">
                            <span class="new">6.135.000₫</span> 
                            <span class="line">7.290.000₫</span> 
                            <span class="discount">16%</span> 
                            <span class="status"> Còn hàng </span>
                        </div>
                    </div>
                    <div class="policy">
                        <div>
                            <i class="iconict-bh"></i>
                            <p><span>Bảo hành chính hãng 12 tháng</span></p>
                        </div>
                        <div>
                            <i class="iconict-dt"></i>
                            <p><span>Đổi trả sản phẩm lỗi miễn phí tại nhà trong 7 ngày <a href="/chinh-sach-doi-tra">(Xem chi tiết)</a></span></p>
                        </div>
                        <div>
                            <i class="iconict-gh"></i>
                            <p><span> Giao hàng toàn quốc </span> Nếu giao trễ, tặng phiếu mua hàng giá trị 100.000đ</p>
                        </div>
                    </div>
                    <div class="options">
                        <div class="color opt hide">
                            <span>Chọn mua màu</span>
                            <div id="color-shockprice" data-shockprice="false">
                                <input type="hidden" name="hdProductCode" value="0131491000852"> 
                                <a href="javascript:" data-code="0131491000852" class="active" data-name="Vàng đồng" title="Vàng đồng" data-position="midtop">
                                    <figure>
                                        <i class="icon-sticky"></i> 
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-gold-200-180x120.png" alt="Vàng đồng" width="50" height="50" data-color="16">
                                        <div class="sibovl"></div>
                                    </figure>
                                </a>
                            </div> 
                        </div>
                        <div class="quantity center opt">
                            <span>Chọn số lượng</span> 
                            <label> 
                                <span class="down">-</span> 
                                <input type="text" min="1" max="50" maxlength="2" name="txtQuantity" value="1"/> 
                                <span class="up">+</span> 
                            </label>
                        </div>
                        <span class="error hide">(*)Vui lòng chọn màu</span>
                    </div>
                    <div class="buttons">
                        <a href="javascript:void(0)" data-pid="112970" data-manuid="2" class="btnorange buynowbtn buynow" title="Mua Samsung Galaxy J7 Plus">Chọn Mua</a>
                    </div>
                </div>
            </div>
            
            <div class="slide-left">
                <div class="boxcontent">
                    <div class="detail">
                        <h3 class="brand">Thương hiệu: 
                            <img src="//cdn.tgdd.vn/Brand/8/Samsung42-s_7.png" data-src="//cdn.tgdd.vn/Brand/8/Samsung42-s_7.png" class="lazy companylogo initial loaded" width="100" height="40" alt="Samsung Galaxy J7 Plus" data-was-processed="true"> 
                            <a href="/thuong-hieu-samsung-1" rel="nofollow">Tìm hiểu thêm</a>
                        </h3>
                        
                        <article class="description">
                            <div class="kit">Bộ sản phẩm chuẩn gồm: <b>Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim</b></div>
                            <div class="short">
                                <h2 class="spec">Thông số kỹ thuật</h2>
                                <ul class="specs">
                                    <li>
                                        <span class="specname">Màn hình:</span>
                                        <span class="specval">Super AMOLED, 5.5", Full HD</span>
                                    </li>
                                    <li>
                                        <span class="specname">Hệ điều hành:</span>
                                        <span class="specval">Android 7.0</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="full">
                                <h2><a href="https://www.vuivui.com/dien-thoai-di-dong/samsung-galaxy-j7-plus" target="_blank" title="Tham khảo điện thoại Samsung Galaxy J7+ tại Vuivui.com" type="Tham khảo điện thoại Samsung Galaxy J7+ tại Vuivui.com">Samsung Galaxy J7+</a> có <a href="https://www.vuivui.com/dien-thoai-di-dong/?pp=57279&amp;sort=PriceDesc" target="_blank" title="Điện thoại có thiết kế kim loại nguyên khối tại Vuivui.com" type="Điện thoại có thiết kế kim loại nguyên khối tại Vuivui.com">thiết kế kim loại nguyên khối</a> sang trọng với màn hình Super AMOLED độ phân giải Full HD. Máy được trang bị camera kép với tính năng chụp xóa phông ảo diệu mang đến cho bạn những trải nghiệm tuyệt vời.</h2>
                            </div>
                        </article>
                    </div>                     
                </div>
            </div>
            
            <div class="slide-right">
                <div class="box-item relative" style="width: 100%">
                    <h4 class="prorelative">Sản phẩm liên quan</h4>
                    <ul class="bxrelative flex" style="width: 100%">
                        <li class="prohv">
                            <a href="/dien-thoai-di-dong/nokia-61-plus">
                                <figure class="pic">
                                    <img width="200" height="200" alt="Nokia 6.1 Plus" class="view" src="https://cdn.tgdd.vn/Products/Images/42/167150/nokia-61-plus-2-200x200.jpg"/>
                                </figure>
                            </a>
                            <div class="prodsame">
                                <a href="/dien-thoai-di-dong/nokia-61-plus">
                                    <div class="riki-name active">Nokia 6.1 Plus</div>
                                </a>
                                <div class="prices">
                                    <span class="price">6.325.000₫</span> 
                                    <span class="line">6.590.000₫</span> 
                                    <label class="discount">4%</label>
                                </div>
                                <div class="itembuy prodebuy" onclick="window.location.href='/dien-thoai-di-dong/nokia-61-plus'" title="Nokia 6.1 Plus">XEM CHI TIẾT
                                </div> 
                            </div>
                        </li>
                        
                        <li class="prohv">
                            <a href="/dien-thoai-di-dong/xiaomi-mi-a2">
                                <figure class="pic">
                                    <img width="200" height="200" alt="Xiaomi Mi A2" class="view" src="https://cdn.tgdd.vn/Products/Images/42/182151/xiaomi-mi-a2-2-200x200.jpg">
                                </figure>
                            </a>
                            <div class="prodsame">
                                <a href="/dien-thoai-di-dong/xiaomi-mi-a2">
                                    <div class="riki-name active">Xiaomi Mi A2</div>
                                </a>
                                <div class="prices">
                                    <span class="price">6.420.000₫</span> 
                                    <span class="line">6.690.000₫</span> 
                                    <label class="discount">4%</label>
                                </div>
                                <div class="itembuy prodebuy" onclick="window.location.href='/dien-thoai-di-dong/xiaomi-mi-a2'" title="Xiaomi Mi A2">XEM CHI TIẾT</div>     
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <?php 
            include("footer.php");
        ?>
    </body>
</html>
