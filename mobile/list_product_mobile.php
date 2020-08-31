<?php 
    include("../config.php");
?>
<html>
    <body>

       
        
        
        <?php
            echo "<section class='bg-orange'>";
                echo    "<div class='flashsale' id='flashsales-1'>";
                echo        "<h2 style='text-transform: uppercase;'>SẢN PHẨM NỔI BẬT</h2>";
                echo        "<div class='scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag' data-position='1' data-isch='false' data-take='16'>";
                             $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee, p.prom, p.price_prom FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.is_hot;";
                            $result=mysqli_query($con,$sql);

                             while($tv_2=mysqli_fetch_array($result)) {
								$link = vn_to_str($tv_2['name']);
								$link = $link ."-". $tv_2['id'];
                                echo "<div class='owl-item active' style='width: 100%; height: 1200px; border: 1px solid #fe7500;'>";
                                echo    "<div class='fpro' data-id='111223'>";
                                echo        "<input type='hidden' class='product-id' value='".$tv_2['id']."'/>"; 
                                echo        "<a href='$link' class='flimg'>";
                                echo            "<img class='lazy loaded' alt='".$tv_2['name']."' src='../resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' data-was-processed='true'/>";
                                echo        "</a>";
                                echo        "<div class='info'>";
                                echo            "<a href='$link' title='".$tv_2['name']."' class='name'>".$tv_2['name']."</a>";
                                echo            "<div class='prices'>";
                                if($tv_2['prom']) {
                                    $rateProm = round(($tv_2['price_sell'] - $tv_2['price_prom'])/$tv_2['price_sell'] * 100);
                                    echo                "<span class='new'><span class='numbers'>".$tv_2['price_prom']."</span>₫</span>";
                                    echo                "<span class='line'><span class='numbers'>".$tv_2['price_sell']."</span>₫</span>";
                                    echo                "<span class='discount'>- ".$rateProm."%</span>";
                                } else {
                                    echo                "<span class='new'><span class='numbers'>".$tv_2['price_sell']."</span>₫</span>";
                                }
                                echo                "<button class='buy add-to-cart' onclick='return buynow(111223,false,'Huawei MediaPad T3 10 (2017)','Máy tính bảng','Huawei',3690000.00,false,this,false)'>Thêm vào giỏ hàng</button>";
                                echo            "</div>";
                                echo        "</div>";
                                echo    "</div>";
                                echo "</div>";
                            }

                echo        "</div>";
                echo    "</div>";
                echo "</section>";  
            
            
            $sql1="SELECT pt.type_id, pt.type_name FROM product_type pt where pt.type_id in ('loa_bluetooth', 'micro_kara', 'camera', 'tainghe', 'duoc_yeu_thich') order by pt.index;";
            $result1=mysqli_query($con,$sql1);
             while($tv_1=mysqli_fetch_array($result1)) {
                echo "<section class='bg-orange'>";
                echo    "<div class='flashsale' id='flashsales-1'>";
                echo        "<h2 style='text-transform: uppercase;'>".$tv_1['type_name']."</h2>";
                echo        "<div class='scrollflash scroll owl-carousel owl-theme owl-loaded owl-drag' data-position='1' data-isch='false' data-take='16'>";
                            $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee, p.prom, p.price_prom FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.product_type='".$tv_1['type_id']."';";
                            $result=mysqli_query($con,$sql);

                             while($tv_2=mysqli_fetch_array($result)) {
								$link = vn_to_str($tv_2['name']);
								$link = $link ."-". $tv_2['id'];
                                echo "<div class='owl-item active' style='width: 100%; height: 1200px; border: 1px solid #fe7500;'>";
                                echo    "<div class='fpro' data-id='111223'>";
                                echo        "<input type='hidden' class='product-id' value='".$tv_2['id']."'/>"; 
                                echo        "<a href='$link' class='flimg'>";
                                echo            "<img class='lazy loaded' alt='".$tv_2['name']."' src='../resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' data-was-processed='true'/>";
                                echo        "</a>";
                                echo        "<div class='info'>";
                                echo            "<a href='$link' title='".$tv_2['name']."' class='name'>".$tv_2['name']."</a>";
                                echo            "<div class='prices'>";
                                if($tv_2['prom']) {
                                    $rateProm = round(($tv_2['price_sell'] - $tv_2['price_prom'])/$tv_2['price_sell'] * 100);
                                    echo                "<span class='new'><span class='numbers'>".$tv_2['price_prom']."</span>₫</span>";
                                    echo                "<span class='line'><span class='numbers'>".$tv_2['price_sell']."</span>₫</span>";
                                    echo                "<span class='discount'>- ".$rateProm."%</span>";
                                } else {
                                    echo                "<span class='new'><span class='numbers'>".$tv_2['price_sell']."</span>₫</span>";
                                }
                                echo                "<button class='buy add-to-cart' onclick='return buynow(111223,false,'Huawei MediaPad T3 10 (2017)','Máy tính bảng','Huawei',3690000.00,false,this,false)'>Thêm vào giỏ hàng</button>";
                                echo            "</div>";
                                echo        "</div>";
                                echo    "</div>";
                                echo "</div>";
                            }

                echo        "</div>";
                echo    "</div>";
                echo "</section>";      
             }

function vn_to_str ($str){
 
				$unicode = array(
 
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
				'd'=>'đ',
 
				'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
				'i'=>'í|ì|ỉ|ĩ|ị',
 
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
				'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
				'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
				'D'=>'Đ',
 
				'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
				'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
				'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
				'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
				'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
			);
 
			foreach($unicode as $nonUnicode=>$uni){
 
				$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
			}
			$str = str_replace(' ','-',$str);
 
			return strtolower($str);
 
		}
		$con->close();
        ?>
    </body>
</html>
