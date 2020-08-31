<html>
	 <head>        
	 	<script src="../resources/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../resources/css/index.css">
        <script src="../resources/js/bootstrap.min.js"></script>
        <link href="../resources/css/bootstrap.min.css" rel="stylesheet" />
        <script src="../resources/js/common.js"></script>
    </head>

	<div class="search-menu orange">
            <div class="left-header">
            	<img src="../resources/img/icon/logo.png" style="height: 100%"/>
            </div>
            
            <div class="right-header">
            	<div style="width: 100%; text-align: center; margin-top: 15px;">
            		<h2 class="title-header">CHUYÊN PHÂN PHỐI CÁC LOẠI LOA KARAOKE BLUETOOTH, ĐIỆN THOẠI MINI...</h2>
            	</div>
            	<div style="width: 100%; height: 50%">
		    		<a class="menu-top" href="../">TRANG CHỦ</a>
		    		<a class="menu-top" href="../khuyen-mai">KHUYẾN MÃI</a>
		    		<a class="menu-top" href="../gioi-thieu">GIỚI THIỆU</a>
		    		<a class="menu-top" href="../lien-he">LIÊN HỆ</a>
		    		<a class="menu-top select-menu" href="../cam-nang-mua-sam">CẨM NANG</a>
		    		<a class="menu-top" href="../chinh-sach-doi-tra">ĐỔI TRẢ HÀNG</a>
		    		
		    	</div>
            </div>
            <header style="padding-right: 0px">
                <div class="wrap">
                    <div class="profile">
                        <a class="cart" href="gio-hang" style="width: 80px"> 
                            <img src="../resources/img/icon/icon-cart.png" />
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
                                    echo "<b class='num sh shopping-cart' style='visibility: visible;'>".$countInCart."</b>";
                                ?>
                            </span> 
<!--                            <span class="total">Tiền hàng: 6.440.000₫</span> -->
                        </a>
                    </div>
                </div>
                <p class="title-phone" style="right: 40px">SĐT: 036.381.0003</p>
            </header>
        </div>
        
        <script>
			if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {   
				//top.location.href = "../";
				if(window.location.pathname.indexOf('/mobile/') == -1) {
					var link = "/mobile" + window.location.pathname;
					top.location.href = link;
				}
		    }
    </script>
</html>	