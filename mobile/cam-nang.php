<html>
	<head>
        <title>Cẩm nang mua hàng</title>
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
				$str = str_replace('?','',$str);
 
				return strtolower($str);
 
			}
			include("../config.php");
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
    						<img src='../resources/img/camnang/$tv_2[id]/$tv_2[avatar]' class='img-cam-nang'/>
    						<div class='content-cam-nang'>
    							<p><a href='$link' class='title-item-camnang'>$tv_2[title]</a></p>
								<div class='des-item-camnang'>
    								<p>$tv_2[description]</p>
								</div>
    							<a href='$link' style='float: right; text-decoration: none; margin-top:20px'>Xem tiếp</a>
    						</div>
    					</div>";
				}
    		?>
    		
    	</div>
        
        <?php 
            include("footer.php");
			$con->close();
        ?>
    </body>
</html>
