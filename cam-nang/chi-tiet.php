<html>
	<head>
		<title>Cẩm nang mua sắm</title>
		<link rel="icon" type="image/gif" href="../resources/img/icon/long-den.jpg" />
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/detail.css">
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2323965204298843&autoLogAppEvents=1"></script>
	</head>
    <body>
        <?php 
        	include("../config.php");
            include("header.php");
			$link = $_SERVER['REQUEST_URI'];
    		$link_array = explode('/',$link);
   			$idString = end($link_array);
			$parts = explode('-', $idString);
			$id = $parts[count($parts)-1];
			$sql = "SELECT title, description FROM hand_book where id=$id";
            $result=mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($result);
        ?> 
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
        ?> 
        <p class="title-cam-nang"><a href="../cam-nang-mua-sam" style="text-decoration: none">CẨM NANG MUA SẮM</a></p>
    	<div class="cam-nang">
    		<p class="title-item-camnang" style="font-size: 25px"><?php echo $data['title']; ?></p>
    		<div id="fb-root"></div>
			<div class="fb-share-button" data-href="http://trangphukien.com/" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftrangphukien.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
    		<div class="item-content">
    			<?php echo nl2br($data['description']);?>
    		</div>
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
                                echo    "<a href='../$link'>";
                                echo        "<figure class='pic'>";
                                echo            "<img alt='".$tv_1['name']."' class='view' src='../resources/img/sanpham/".$tv_1['id']."/".$tv_1['avatar']."'/>";
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
			$con->close();
        ?>
    
        <script type="text/javascript">
            function add_chatinline(){var hccid=82244800;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}add_chatinline(); 
        </script>
    </body>
</html>
