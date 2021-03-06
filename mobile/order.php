﻿<?php 
    include("../config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="../resources/img/icon/long-den.jpg" />
        <script src="../resources/js/jquery.min.js"></script>
        <script src="../resources/js/common_mobile.js"></script>
        <link rel="stylesheet" type="text/css" href="../resources/css/index_mobile.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/order_mobile.css">
    </head>
    <body style="width: 1200px">
        <div class="search-menu orange">
            <div class="container1">
                <form class="mainsearch" onsubmit="return submitSearch(this)">
                    <div class="pr">
                        <input type="text" name="key" placeholder="Bạn mua gì?" style="height: 115px;"> 
<!--                        <button type="submit" class="btnsearch"><i class="icon-search"></i></button> -->
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
<!--                            <i class="icon-cart"></i> -->
                            <img src="../resources/img/icon/cart.png" style="width: 90px; height: 90px; float: right"/>
                            <span>
                                <?php
                                    session_start();
                                    $countInCart = 0;
                                    if(isset($_SESSION['cart'])) {
                                        foreach($_SESSION['cart'] as $id => $value) { 
                                            if($id != '')
                                                $countInCart += $value;
                                        } 
                                    }
                                    echo "<b class='num sh shopping-cart' style='visibility: visible; height: 65px;'>".$countInCart."</b>";
                                ?>
                            </span> 
<!--                            <span class="total">Tiền hàng: 6.440.000₫</span> -->
                        </a>
                    </div>
                </div>
            </header>
        </div>
        
        <div style="width: 100%; text-align: center; background-color: #fff; margin-top: 135px">
            <nav class="flex bread">
                <a href="./" class="navi item brdc">Trang chủ</a> 
                <a href="javascript:void(0)" class="navi item brdc">Giỏ hàng</a> 
            </nav>
        </div>
        
        <div id="cart" class="cart-wrap">
            <div class="cart-content flex">
                <div id="block1" class="block">
                    <div class="lst-product">
                        <div>
                            <?php
                                $shipper = 0;
                                $totalPrice = 0;
                                if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                    $shipper = 20000;
                                    $sql="SELECT id, name, avatar, price_sell, price_prom, prom FROM product WHERE id IN ("; 
                                    foreach($_SESSION['cart'] as $id => $value) { 
                                        $sql.="'".$id."',"; 
                                    } 
                                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                                    $result=mysqli_query($con,$sql);
                                    while($tv_2=mysqli_fetch_array($result)) {
                                        echo "<div class='item-order'>";
                                        echo    "<div class='item'>";
                                        echo        "<img alt='".$tv_2['name']."' src='../resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' width='80' height='80'/>";
                                        echo        "<div class='colinfo'>";
                                        echo            "<a href='detail.php?product_id=".$tv_2['id']."' class='name'>".$tv_2['name']."</a>";
                                        echo            "<div class='quantity'>";
                                        echo                "<label>Số lượng:</label>";
                                        echo                "<div class='quantitynum'>";
                                        echo                    "<i class='noselect desc-count'>-</i>";
                                        echo                    "<input type='number' class='qty noselect count-product' value='".$_SESSION['cart'][$tv_2['id']]."'/>";
                                        echo                    "<i class='noselect inc-count'>+</i>";
                                        echo                "</div>";
                                        echo            "</div> <!---->"; 
                                        echo            "<div class='info-text'></div>"; 
                                        echo            "<div class='info-text error'>";
                                        echo            "</div>"; 
                                        echo        "</div>"; 
                                        echo        "<div class='colmoney'>";
                                        if($tv_2['prom']) {
                                            echo            "<b class='numbers product-price' style='text-decoration: none; font-size: 16px;'>".$tv_2['price_prom'] * $_SESSION['cart'][$tv_2['id']]."</b>₫"; 
                                            echo            "<span><b class='numbers'>".$tv_2['price_sell'] * $_SESSION['cart'][$tv_2['id']]."</b>₫</span>";
                                            $totalPrice += ($tv_2['price_prom'] * $_SESSION['cart'][$tv_2['id']]);
                                            echo "<input type='hidden' class='price-one-product' value='".$tv_2['price_prom']."'/>";
                                        } else {
                                            echo            "<b class='numbers product-price' style='text-decoration: none; font-size: 50px;'>".$tv_2['price_sell'] * $_SESSION['cart'][$tv_2['id']]."</b>₫"; 
                                            $totalPrice += ($tv_2['price_sell'] * $_SESSION['cart'][$tv_2['id']]);
                                            echo "<input type='hidden' class='price-one-product' value='".$tv_2['price_sell']."'/>";
                                        }
                                        echo "<input type='hidden' class='product-id' value='".$tv_2['id']."'/>";
                                        echo            "<a class='delete od-delete-product'>Xóa</a>";
                                        echo        "</div>";
                                        echo    "</div>"; 
                                        echo    "<div class='clr'>  </div>"; 
                                        echo "</div>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="summary">
                        <div class="cost">
                            <span>Tiền hàng: </span> 
                            <?php 
                                echo "<label><b id='carttotal' class='numbers' style='font-weight: normal; font-size: 50px'>".$totalPrice."</b>₫</label>";
                            ?>
                        </div> <!----> 
                        <div class="shipfee">
                            <span>Phí giao hàng:</span> 
                            <?php 
                                echo "<label class='rightshiping'>";
                                echo    "<span id='cartshipfee' class='numbers'>".$shipper."</span>₫";
                                echo "</label>";
                            ?>
                        </div> 
                        <div class="totalfinal">
                            <div>
                                <span>Tổng tiền: </span>
                                <?php
                                    $total = $totalPrice + $shipper;
                                    echo "<label><b id='cartsumtotalfinal' class='numbers' style='font-weight: normal;'>".$total."</b>₫</label>";
                                ?>
                                
                            </div> 
                            <div class="clr"></div>     
                        </div> <!----> <!---->
                    </div>
                    
                    <div class="boxsugguest">
                        <a href="./" class="btn-buymore">Mua thêm</a>
                    </div>
                </div>
                
                <div id="block2" class="block focus">
                    <form id="frmConfirmCart" method="post" autocomplete="off">
                        <div>
                            <div class="box-newaddress">
                                <h3 class="rtv">NHẬP THÔNG TIN NHẬN HÀNG</h3>
                                <div class="row flex row-first" style="width: 100%">
                                    <div class="wrapaddress box-data w100" style="width: 100%">
                                        <div class="city">
                                            <label data-value="3" class="error">Tỉnh/Thành</label> 
                                            <input type="hidden" name="ProfileItems_0_ProvinceId" id="ProfileItems_0_ProvinceId" value="3"/>
                                        </div>
                                        <div class="dist nocheck">
                                            <select id="ProfileItems_0_DistrictId" class="select2-hidden-accessible" aria-hidden="true">
                                                <option value="" disabled selected>Chọn tỉnh thành</option>
                                                <?php
                                                    $sql1="SELECT matp, name from devvn_tinhthanhpho order by name asc";
                                                    $result1=mysqli_query($con,$sql1);
                                                    while($tv_1=mysqli_fetch_array($result1)) {
                                                        if($tv_1['matp'] == 79)
                                                            echo "<option value='".$tv_1['matp']."' selected='selected'>".$tv_1['name']."</option>";
                                                        else echo "<option value='".$tv_1['matp']."'>".$tv_1['name']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="box-check">
                                        <span class="checkmark square"></span>
                                    </div>
                                </div>
                                
                                <div class="row flex" style="width: 100%">
                                    <div class="wrapinput box-data w100">
                                        <div class="error">Địa chỉ</div>
                                        <input data-type="address" maxlength="255" name="ProfileItems_0_Address" id="customerAddress" placeholder="Nhập địa chỉ của bạn (bắt buộc)" type="text" class="text"/>
                                        
                                    </div> 
                                    <div class="box-check done">
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                
<!--                                <div class="row flex" style="width: 100%">
                                    <div class="wrapcheckbox box-data w100">
                                        <span class="gender">
                                            <input type="radio" name="ProfileItems_0_Gender" id="ProfileItems_0_Gender1" value="1"> 
                                            <label for="ProfileItems_0_Gender1"> Anh &nbsp; </label>
                                        </span> 
                                        <span class="gender">
                                            <input type="radio" name="ProfileItems_0_Gender" id="ProfileItems_0_Gender0" value="0"> 
                                            <label for="ProfileItems_0_Gender0"> Chị</label>
                                        </span>
                                    </div> 
                                    <div class="box-check">
                                        <span class="checkmark">
                                        </span>
                                    </div>
                                </div>-->
                                
                                <div class="row flex" style="width: 100%">
                                    <div class="wrapinput box-data w100">
                                        <div class="error">Họ và tên</div> 
                                        <input data-type="name" maxlength="50" name="ProfileItems_0_CustomerName" id="customerName" placeholder="Họ và tên (bắt buộc)" autocomplete="off" type="text" class="text warning"/> 
                                    </div> 
                                    <div class="box-check">
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                
                                <div class="row flex" style="width: 100%">
                                    <div class="wrapinput box-data w100">
                                        <div class="error">Số điện thoại</div>
                                        <input data-type="phone" maxlength="11" name="ProfileItems_0_CustomerPhone" id="phoneNumber" placeholder="Nhập số điện thoại (bắt buộc)" autocomplete="off" type="tel" class="text"/>
                                    </div> 
                                    <div class="box-check done">
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                
                                <div class="row flex" style="width: 100%">
                                    <div class="wrapinput box-data w100">
                                        <div class="error">Email</div>
                                        <input data-type="email" maxlength="50" name="ProfileItems_0_CustomerEmail" id="email" placeholder="Email nhận hàng (không bắt buộc)" autocomplete="off" type="email" class="text"/> <!---->
                                    </div> 
                                    <div class="box-check">  
                                    </div>
                                </div>
                                
                                <div class="row flex" style="width: 100%">
                                    <div class="wrapinput box-data w100">
                                        <div class="error">Ghi chú</div>
                                        <textarea id="customerNote" placeholder="Ghi chú thêm (nếu có)" rows="5" cols="20" maxlength="200" class="textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div data-row="9" class="row box-payment" style="margin-top: 120px">
                                <div class="box-data">
                                    <div class="wrapbtn">
                                        <?php 
                                            if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                                echo "<a class='btn-og btn-pay-home'> ĐẶT MUA</a>";
                                            } else {
                                                echo "<a class='btn-og' style='background: #bdb5af'> ĐẶT MUA</a> ";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php 
            include("../footer.php");
			$con->close();
        ?>
    </body>
</html>
