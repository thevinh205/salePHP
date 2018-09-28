<html>
    <head>
        <link rel="icon" type="image/gif" href="../resources/img/icon/long-den.jpg" />
        <script src="../resources/js/jquery.min.js"></script>
        <script src="../resources/js/common_mobile.js"></script>
        <link rel="stylesheet" type="text/css" href="../resources/css/index_mobile.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/order_mobile.css">
    </head>
    <body style="width: 1200px; min-height:116%; position:relative;">
        <div class="search-menu orange">
            <div class="container1">
                <form class="mainsearch" onsubmit="return submitSearch(this)">
                    <div class="pr">
                        <input type="text" name="key" placeholder="Bạn mua gì?" style="height: 115px;"> 
                        <span id="searchclear" class="searchclear"><i class="icon-searchclr"></i></span>
                    </div>
                </form>
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
                <a href="order.php" class="navi item brdc">Giỏ hàng</a> 
            </nav>
        </div>
        
        <div style="text-align: center; width: 100%; height: 100%; vertical-align: middle; font-weight: bold; color: white;">
            
            <div style="font-size: 100px; padding-top: 45%; width: 100%">Đặt hàng thành công </div>
        </div>
        
        <div style="position:absolute; bottom:0">
        <?php 
            include("../footer.php");
        ?>
        </div>
    </body>
</html>
