<html>
<?php 
        	include("../../config.php");
			$link = $_SERVER['REQUEST_URI'];
    		$link_array = explode('/',$link);
   			$idString = end($link_array);
			
			$parts1 = explode('?', $idString);
			$ids = $parts1[0];

			$parts = explode('-', $ids);
			$id = $parts[count($parts)-1];
			$sql = "SELECT title, description, avatar FROM hand_book where id=$id";
            $result=mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($result);
			$description = $data['description'];
			$description = str_replace('../resources','../../resources',$description);
			
			
        ?> 
	<head>
		<meta name="google-site-verification" content="p8ppsxeqLXPw2GwtcIvo-0NuE0NJdvUnhrea4IC1xp8" />
		<title><?php echo $data['title']; ?></title>
		<link rel="icon" type="image/gif" href="../../resources/img/icon/icon.png" />
        
        <?php
        echo "<meta property='og:title' content='$data[title]' />
			<meta property='og:image' content='http://$_SERVER[SERVER_NAME]/resources/img/camnang/$id/$data[avatar]' />";
		?>
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
			include("header.php");
        ?> 
        <p class="title-cam-nang">
        	<a href="../cam-nang-mua-hang" style="text-decoration: none; margin-top: 15px; display: block;">CẨM NANG MUA SẮM</a>
        	</p>
    	<div class="cam-nang">
    		<h1 class="title-item-camnang" ><?php echo $data['title']; ?></h1>
    		
    		<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

<div class="fb-share-button" data-href="http://mucnow.com/cam-nang/muc-kho-mua-o-dau-2" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmucnow.com%2Fcam-nang%2Fmuc-kho-mua-o-dau-2&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

			
    		<div class="item-content">
    			<?php echo nl2br($description);?>
    		</div>
    	</div>
    
        
        <?php 
            include("footer.php");
			$con->close();
        ?>
    </body>
</html>
