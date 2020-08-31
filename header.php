<html>
	 <head>        
        <link rel="stylesheet" type="text/css" href="resources/css/index.css">
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/docs.min.js"></script>
        <script src="resources/js/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript" src="resources/js/jssor.slider.min.js"></script>
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/common.js"></script>
    </head>

	<div class="search-menu orange">
            <div class="left-header">
            	<img src="resources/img/icon/logo.png" style="height: 100%"/>
            </div>
            
            <div class="right-header">
            	<div style="width: 100%; text-align: center; margin-top: 15px;">
            		<h2 class="title-header">CHUYÊN PHÂN PHỐI CÁC LOẠI LOA KARAOKE BLUETOOTH, ĐIỆN THOẠI MINI...</h2>
            	</div>
            	<div style="width: 100%; height: 50%">
		    		<a class="menu-top menu-trang-chu" href="./">TRANG CHỦ</a>
		    		<a class="menu-top menu-khuyen-mai" href="khuyen-mai">KHUYẾN MÃI</a>
		    		<a class="menu-top menu-gioi-thieu" href="gioi-thieu">GIỚI THIỆU</a>
		    		<a class="menu-top menu-lien-he" href="lien-he">LIÊN HỆ</a>
		    		<a class="menu-top menu-cam-nang" href="cam-nang-mua-sam">CẨM NANG</a>
		    		<a class="menu-top menu-chinh-sach" href="chinh-sach-doi-tra">ĐỔI TRẢ HÀNG</a>
		    		
		    	</div>
            </div>
            <header>
                <div class="wrap">
                    <div class="profile">
                        <a class="cart" href="gio-hang" style="width: 80px"> 
                            <img src="resources/img/icon/icon-cart.png" style="float:left;"/>
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
                <p class="title-phone">SĐT: 036.381.0003</p>
            </header>
        </div>
        <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        	if(window.location.pathname.indexOf('/mobile/') == -1) {
    			var link = "/mobile" + window.location.pathname;
    			top.location.href = link;
    		}
        }
        
    </script>
</html>	