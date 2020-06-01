<?php 
    include("config.php");
?>
<html>
	
    <body>
        <?php
            $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee, p.prom, p.price_prom FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1 and p.id='$_GET[product_id]';";
            $result=mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($result);
			
			$link = vn_to_str($data['name']);
			$link = $link ."-". $data['id'];
			
            echo "<div class='owl-item active' style='width: 240px; height: 300px;'>";
            echo    "<div class='fpro' data-id='111223'>";
            echo        "<input type='hidden' class='product-id' value='".$data['id']."'/>"; 
            echo        "<a href='$link' class='flimg'>";
            echo            "<img class='lazy loaded' alt='".$data['name']."' src='resources/img/sanpham/".$data['id']."/".$data['avatar']."' name='imagename'/>";
            echo        "</a>";
            echo        "<div class='info'>";
            echo            "<a href='$link' title='".$data['name']."' class='name'>".$data['name']."</a>";
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
        ?>
    
    </body>
</html>
