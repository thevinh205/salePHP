<?php 
    include("config.php");
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="resources/css/index.css">
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <?php
            $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee, p.prom, p.price_prom FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.id='$_GET[product_id]';";
            $result=mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($result);

            echo "<div class='owl-item active' style='width: 240px; height: 300px;'>";
            echo    "<div class='fpro' data-id='111223'>";
            echo        "<input type='hidden' class='product-id' value='".$data['id']."'/>"; 
            echo        "<a href='detail.php?product_id=".$data['id']."' class='flimg'>";
            echo            "<img class='lazy loaded' alt='".$data['name']."' src='resources/img/sanpham/".$data['id']."/".$data['avatar']."' name='imagename'/>";
            echo        "</a>";
            echo        "<div class='info'>";
            echo            "<a href='detail.php?product_id=".$data['id']."' title='".$data['name']."' class='name'>".$data['name']."</a>";
            echo            "<div class='prices'>";
            if($data['prom']) {
                $rateProm = round(($data['price_sell'] - $data['price_prom'])/$data['price_sell'] * 100);
                echo                "<span class='new'><span class='numbers'>".$data['price_prom']."</span>₫</span>";
                echo                "<span class='line'><span class='numbers'>".$data['price_sell']."</span>₫</span>";
                echo                "<span class='discount'>- ".$rateProm."%</span>";
            } else {
                echo                "<span class='new'><span class='numbers'>".$data['price_sell']."</span>₫</span>";
            }
            echo                "<button class='buy add-to-cart'>Thêm vào giỏ hàng</button>";
            echo            "</div>";
            echo        "</div>";
            echo    "</div>";
            echo "</div>";  
        ?>
    
    </body>
</html>
