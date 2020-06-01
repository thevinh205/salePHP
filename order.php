<?php 
    include("config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <link rel="stylesheet" type="text/css" href="resources/css/order.css">
    </head>
    <body>
        <?php 
		    include("header.php");
		?>
        
        <div style="width: 100%; text-align: center; background-color: #fff; margin-top: 80px;">
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
                                        echo        "<img alt='OPPO F5 Youth' src='resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' width='80' height='80'/>";
                                        echo        "<div class='colinfo'>";
                                        echo            "<a href='detail.php?product_id=".$tv_2['id']."' class='name'>".$tv_2['name']."</a>";
                                        echo            "<div class='quantity'>";
                                        echo                "<label>Số lượng:</label>";
                                        echo                "<div class='quantitynum'>";
										echo 				"<input type='button' class='minus desc-count' value='-' onclick='reductionProductNumber(this)' style='top:50px;left: 170px;'/>";
        								echo 				"<input size='6' value='".$_SESSION['cart'][$tv_2['id']]."' min='1' max='50' class='input-dat-hang count-product' style='width:75px'/>";
        								echo 				"<input type='button' class='plus inc-count' value='+' onclick='increaseProductNumber(this)' style='top:25px;left: 170px;'/>";
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
                                            echo            "<b class='numbers product-price' style='text-decoration: none; font-size: 16px;'>".$tv_2['price_sell'] * $_SESSION['cart'][$tv_2['id']]."</b>₫"; 
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
                                echo "<label><b id='carttotal' class='numbers' style='font-weight: normal;'>".$totalPrice."</b>₫</label>";
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
                            <div data-row="9" class="row box-payment" style="margin-top: 15px">
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
            include("footer.php");
        ?>
    </body>
</html>
