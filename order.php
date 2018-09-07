<?php 
    include("config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/common.js"></script>
        <link rel="stylesheet" type="text/css" href="resources/css/index.css">
        <link rel="stylesheet" type="text/css" href="resources/css/order.css">
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
        
        <div id="cart" class="cart-wrap">
            <div class="cart-content flex">
                <div id="block1" class="block">
                    <div class="lst-product">
                        <div>
                            <div>
                                <div data-code="0131491000917" class="item">
                                    <img alt="OPPO F5 Youth" src="https://cdn.tgdd.vn/Products/Images/42/141763/oppo-f5-youth-den-1-2-180x120.jpg" width="80" height="80"/> 
                                    <div class="colinfo">
                                        <a href="/dien-thoai-di-dong/oppo-f5-youth" class="name">OPPO F5 Youth Đen </a> 
                                        <div class="quantity">
                                            <label>Số lượng:</label> 
                                            <div class="quantitynum">
                                                <i class="noselect">-</i> 
                                                <input type="number" min="0" max="50" step="1" class="qty noselect"/> 
                                                <i class="noselect">+</i>
                                            </div>
                                        </div> <!----> 
                                        <div class="info-text"></div> 
                                        <div class="info-text error">
                                        </div> 
                                    </div> 
                                    <div class="colmoney">
                                        <strong>4.885.000₫</strong> 
                                        <span><b>5.990.000₫</b></span> 
                                        <a class="delete">Xóa</a>
                                    </div>
                                </div> 
                                <div class="clr">  </div> 
                            </div>
                            <div>
                                <div data-code="8851123224802" class="item">
                                    <img alt="Nước tăng lực M-150 hương Mật ong Sâm lon 250ml" src="https://cdn.tgdd.vn/Products/Images/3226/79182/nuoc-tang-luc-m150-mat-ong-sam-250ml-190x190.jpg" width="80" height="80"/> 
                                    <div class="colinfo">
                                        <a href="/nuoc-tang-luc/nuoc-tang-luc-m150-mat-ong-sam-250ml" class="name">Nước tăng lực M-150 hương Mật ong Sâm lon 250ml</a> 
                                        <div class="quantity">
                                            <label>Số lượng:</label> 
                                            <div class="quantitynum">
                                                <i class="noselect">-</i> 
                                                <input type="number" min="0" max="50" step="1" class="qty noselect"/> 
                                                <i class="noselect">+</i>
                                            </div>
                                        </div> <!----> 
                                        <div class="info-text"></div> 
                                        <div class="info-text error"></div>
                                    </div> 
                                    <div class="colmoney">
                                        <strong>8.500₫</strong> 
                                        <span><b>9.500₫</b></span> 
                                        <a class="delete">Xóa</a>
                                    </div>
                                </div> 
                                <div class="clr"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="summary">
                        <div class="cost">
                            <span>Tiền hàng: </span> 
                            <label id="carttotal">4.893.500₫</label>
                        </div> <!----> 
                        <div class="shipfee">
                            <span>Phí giao hàng:</span> 
                            <label class="rightshiping">
                                <span id="shippingdiscount">10.000₫</span> 
                                <span id="cartshipfee">MIỄN PHÍ</span>
                            </label> <!---->
                        </div> 
                        <div class="totalfinal">
                            <a href="javascript:;" class="couponlink">Nhập mã giảm giá</a> 
                            <div>
                                <span>Tổng tiền: </span> 
                                <label id="cartsumtotalfinal">4.893.500₫</label>
                            </div> 
                            <div class="clr"></div>     
                        </div> <!----> <!---->
                    </div>
                    
                    <div class="boxsugguest">
                        <a href="/" class="btn-buymore">Mua thêm</a>
                    </div>
                </div>
                
                <div id="block2" class="block focus">
                    <form id="frmConfirmCart" method="post" autocomplete="off">
                        <div>
                            <div class="box-newaddress">
                                <div class="row flex row-first" style="width: 100%">
                                    <div class="wrapaddress box-data w100" style="width: 100%">
                                        <div class="city">
                                            <label data-value="3">TP.Hồ Chí Minh</label> 
                                            <input type="hidden" name="ProfileItems_0_ProvinceId" id="ProfileItems_0_ProvinceId" value="3"/>
                                        </div>
                                        <div class="dist nocheck">
                                            <select id="ProfileItems_0_DistrictId" class="select2-hidden-accessible" aria-hidden="true">
                                                <option value="" disabled selected>Chọn tỉnh thành</option>
                                                <option value="hcm">Tỉnh thành</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="box-check">
                                        <span class="checkmark square"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php 
            include("footer.php");
        ?>
    </body>
</html>
