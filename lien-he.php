<html>

	<head>

		<title>Liên hệ</title>

		<link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />

        <link rel="stylesheet" type="text/css" href="resources/css/main.css">

	</head>

    <body>

        <?php 

            include("header.php");

        ?>

        

        <div class="lien-he">

        	<div class="contact-info">

        		<p class="title-contact-info">THÔNG TIN LIÊN LẠC</p>

        		<p class="title-company">Công ty TNHH PHU KIEN PT</p>

        		<br/>

        		<p style="font-size: 16px">Địa chỉ: 27/4D Đông Lân, Bà Điểm, Hóc Môn, HCM</p>

        		<br/>

        		<p style="font-size: 16px">Điện thoại: 036.381.0003 hoặc 093.202.2210</p>

        		<br/>

        		<p style="font-size: 16px">Email: mucnow99@gmail.com</p>

        		<br/>

        		<p style="font-size: 16px">Skype: thevinh_205</p>

        		<br/>

        		<p style="font-size: 16px">Fanpage: <a class="name-fanpage" target="_blank" href="https://www.facebook.com/mucnow">MUCNOW</a></p>

        	</div>

        	<div class="send-message">

        		<p class="title-contact-info">GỬI THÔNG ĐIỆP TRỰC TUYẾN</p>

        		<p class="title-send-message" style="margin-top: 30px">Tên của bạn (yêu cầu)</p>

        		<input name="customerName" class="input-send-message">

        		<br/>

        		<p class="title-send-message" style="margin-top: 30px">Điện thoại (yêu cầu)</p>

        		<input name="customerPhone" class="input-send-message">

        		

        		<br/>

        		<p class="title-send-message" style="margin-top: 30px">Lời nhắn (yêu cầu)</p>

        		<textarea name="customerMessage" class="text-send-message"></textarea>

        		<br/>

        		<input type="submit" class="submit-send-message" id="btnSendMessage" title="GỬI" value="GỬI" onclick="sendMessage()"/>

        	</div>

        

        </div>

        

        <p class="send-msg-success" id="sendMsgSuccess">GỬI YÊU CẦU THÀNH CÔNG </p>

        <div class=map>

        	<img src="resources/img/banner/map.png" class="img-map"/>

        </div>

        <?php 

            include("footer.php");

        ?>

    

        <script type="text/javascript">

	        jQuery(document).ready(function ($) {

	        	$(".menu-lien-he").addClass("select-menu");

	        });

            function add_chatinline(){var hccid=82244800;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}add_chatinline(); 

        </script>

    </body>

</html>

