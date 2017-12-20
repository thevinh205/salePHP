<?php 
    include("../config.php");
?>
<html xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Danh sách cửa hàng</title>
    <link rel="stylesheet" href="../static/css/shop.css" />
</head>
<body>
    <?php 
        include("../layout/header.html");
    ?>
    <div class="container">
        <div class="row">
            <?php 
                include("../layout/left-menu.html");
            ?>
            
            <div class="body">
                <div class="header">
                    <span>Danh sách cửa hàng</span>
                </div>
                
                <div class="content">
                    <?php 
                        $sql="SELECT * FROM shop";
                        $result=mysqli_query($con,$sql);
                        while($tv_2=mysqli_fetch_array($result)){
                            echo "<div class='divShop'>";
                            echo    "<a href='shop_detail.php?shopId=$tv_2[id]'>";
                            echo        "<div class='shop_services_item'>";
                            echo            "<img class='imageIconShop' src='../static/img/cua_hang.png'/>";
                            echo        "</div>";
                            echo        "<span align='center' class='titleShop'>$tv_2[name]</span>";
                            echo    "</a>";
                            echo "</div>"; 
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
    </body>
</html>