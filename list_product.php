<?php 
    include("config.php");
?>
<html>
    <body>
		<head>        
	        <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
	        <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
	    </head>
		
        
        <?php
            echo "<section class='bg-orange'>";
                echo    "<div class='flashsale'>";
                echo        "<h2 style='text-transform: uppercase;'>SẢN PHẨM NỔI BẬT</h2>";
                echo        "<div class='scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag' data-position='1' data-isch='false' data-take='16' id='list_product_noi_bat'>";
                            $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee, p.prom, p.price_prom FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.is_hot;";
                            $result=mysqli_query($con,$sql);

                             while($tv_2=mysqli_fetch_array($result)) {                               

                                echo "<script>";
                                echo    "var url = 'item_product.php?product_id=".$tv_2['id']."';";
                                echo    "$.ajax({";	
                                echo            "type: 'GET',"; 
                                echo            "url: url,"; 
                                echo            "contentType: 'application/x-www-form-urlencoded; charset=UTF-8',";
                                echo            "async: false,";
                                echo            "success: function(data){"; 
                                echo                "$('#list_product_noi_bat').append(data);";
                                echo            "},";
                                echo            "error: function(XMLHttpRequest, textStatus, errorThrown){";
                                echo            "}";
                                echo        "});"; 
                                echo "</script>";
                            }

                echo        "</div>";
                echo    "</div>";
                echo "</section>";
            
            
            
            $sql1="SELECT pt.type_id, pt.type_name FROM product_type pt where pt.type_id in ('loa_bluetooth', 'micro_kara', 'camera', 'tainghe', 'duoc_yeu_thich') order by pt.index;";
            $result1=mysqli_query($con,$sql1);
             while($tv_1=mysqli_fetch_array($result1)) {
                echo "<section class='bg-orange'>";
                echo    "<div class='flashsale'>";
                echo        "<h2 style='text-transform: uppercase;'>".$tv_1['type_name']."</h2>";
                echo        "<div class='scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag' data-position='1' data-isch='false' data-take='16' id='list_product_".$tv_1['type_id']."'>";
                            $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee, p.prom, p.price_prom FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.product_type='".$tv_1['type_id']."';";
                            $result=mysqli_query($con,$sql);

                             while($tv_2=mysqli_fetch_array($result)) {                               

                                echo "<script>";
                                echo    "var url = 'item_product.php?product_id=".$tv_2['id']."';";
                                echo    "$.ajax({";	
                                echo            "type: 'GET',"; 
                                echo            "url: url,"; 
                                echo            "contentType: 'application/x-www-form-urlencoded; charset=UTF-8',";
                                echo            "async: false,";
                                echo            "success: function(data){"; 
                                echo                "$('#list_product_".$tv_1['type_id']."').append(data);";
                                echo            "},";
                                echo            "error: function(XMLHttpRequest, textStatus, errorThrown){";
                                echo            "}";
                                echo        "});"; 
                                echo "</script>";
                            }

                echo        "</div>";
                echo    "</div>";
                echo "</section>";      
             }
        ?>
    
    <script>
        jQuery(document).ready(function ($) {
            $(".owl-item").each(function(i) {
                $(this).delay(50 * i).show(0);
            });
        });
    </script>
    </body>
</html>
