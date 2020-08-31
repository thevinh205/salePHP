<html>
	<head>
		<title>Cẩm nang mua sắm</title>
		<link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <link rel="stylesheet" type="text/css" href="resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="resources/css/detail.css">
	</head>
    <body>
        <?php 
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
			include("config.php");
            include("header.php");
			$sql = "SELECT id, title, description, create_date, create_by, avatar FROM hand_book where shop_id=1";
			$result=mysqli_query($con,$sql);
        ?> 
        
        <p class="title-cam-nang">CẨM NANG MUA SẮM</p>
    	<div class="cam-nang">
    		<?php 
    			while($tv_2=mysqli_fetch_array($result)){
					$link = "cam-nang/".vn_to_str($tv_2['title']);
					$link = $link ."-". $tv_2['id'];
					echo "<div class='item-cam-nang'>
							<a href='$link' class='title-item-camnang' title='$tv_2[title]'>
    							<img src='resources/img/camnang/$tv_2[id]/$tv_2[avatar]' class='img-cam-nang'/>
							</a>
    						<div class='content-cam-nang'>
    							<p><a href='$link' class='title-item-camnang'>$tv_2[title]</a></p>
								<div class='des-item-camnang'>
    								<p>$tv_2[description]</p>
								</div>
    							<a href='$link' style='float: right; text-decoration: none'>Xem tiếp</a>
    						</div>
    					</div>";
				}
    		?>
    		
    	</div>
    	<div class="slide-right">
                <div class="box-item relative" style="width: 100%">
                    <h4 class="prorelative" style="color: #ff7703; font-size: 19px">SẢN PHẨM NỔI BẬT</h4>
                    <ul class="bxrelative flex" style="width: 100%">
                        <?php
                            $sql1 = "SELECT id, name, avatar, price_sell, price_prom, prom FROM product where product_type = 'massage' and show_web=1 ORDER BY RAND() limit 4";
                            $result1=mysqli_query($con,$sql1);
                            while($tv_1=mysqli_fetch_array($result1)) {
								$link = vn_to_str($tv_1['name']);
								$link = $link ."-". $tv_1['id'];
                                echo "<li class='prohv'>";
                                echo    "<a href='$link'>";
                                echo        "<figure class='pic'>";
                                echo            "<img alt='".$tv_1['name']."' class='view' src='resources/img/sanpham/".$tv_1['id']."/".$tv_1['avatar']."'/>";
                                echo        "</figure>";
                                echo    "</a>";
                                echo    "<div class='prodsame'>";
                                echo        "<a href='detail.php?product_id=".$tv_1['id']."'>";
                                echo            "<div class='riki-name active'>".$tv_1['name']."</div>";
                                echo        "</a>";
                                echo        "<div class='prices'>";
                                if($tv_1['prom']) {
                                    $rateProm = round(($tv_1['price_sell'] - $tv_1['price_prom'])/$tv_1['price_sell'] * 100);
                                    echo            "<span class='price'><span class='numbers'>".$tv_1['price_prom']."</span>₫</span>";
                                    echo            "<span class='line'><span class='numbers'>".$tv_1['price_sell']."</span>₫</span>"; 
                                    echo            "<label class='discount'>".$rateProm."%</label>";
                                } else {
                                    echo            "<span class='price'><span class='numbers'>".$tv_1['price_sell']."</span>₫</span>";
                                }
                                echo        "</div>";
                                echo        "<div class='itembuy prodebuy' title='".$tv_1['name']."'><a href='detail.php?product_id=".$tv_1['id']."' style='color:#fe7500; font-size:13px'>XEM CHI TIẾT</a>";
                                echo        "</div>"; 
                                echo    "</div>";
                                echo "</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        
        <?php 
            include("footer.php");
        ?>
    
        <script type="text/javascript">
	        jQuery(document).ready(function ($) {
	        	$(".menu-cam-nang").addClass("select-menu");
	        });
            function add_chatinline(){var hccid=82244800;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}add_chatinline(); 
        </script>
    </body>
</html>
<?php 
    $con->close();
?>
