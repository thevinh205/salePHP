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
            <div class="container1">
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
                        <a class="cart" href="order.php"> 
                            <i class="icon-cart"></i> 
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
                        </a>
                    </div>
                </div>
            </header>
        </div>
        
        <div style="width: 100%; text-align: center; background-color: #fff; margin-top: 80px;">
            <nav class="flex bread">
                <a href="./" class="navi item brdc">Trang chủ</a> 
                <a href="order.php" class="navi item brdc">Giỏ hàng</a> 
            </nav>
        </div>
        
        <div style="text-align: center; width: 100%; height: 500px; vertical-align: middle; font-weight: bold; color: white;">
            
            <div style="font-size: 50px; padding-top: 200px">Đặt hàng thành công </div>
        </div>
        
        <?php 
            include("footer.php");
        ?>
    </body>
</html>
