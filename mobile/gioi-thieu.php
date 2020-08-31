<html>
    <body>
    	<title>Giới thiệu</title>
        <?php 
            include("header.php");
        ?>

       <div class="container2">
        <!-- Jssor Slider Begin -->

        <style>
            /* jssor slider loading skin spin css */
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }
        </style>
        <div id="slider1_container" class="slider_container">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
            </div>

            <!-- Slides Container -->
            <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1200px; height: 442px;
            overflow: hidden;">
                 <div>
                    <img data-u="image" src="../resources/img/banner/1.jpg" />
                </div>
                <div>
                    <img data-u="image" src="../resources/img/banner/2.jpg" />
                </div>
                <div>
                    <img data-u="image" src="../resources/img/banner/3.jpg" />
                </div>
                <div>
                    <img data-u="image" src="../resources/img/banner/4.jpg" />
                </div>
            </div>
            
            <!--#region Bullet Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
            <style>
                .jssorb031 {position:absolute;}
                .jssorb031 .i {position:absolute;cursor:pointer;}
                .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
                .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
                .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
                .jssorb031 .i.idn {opacity:.3;}
            </style>
            <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!--#endregion Bullet Navigator Skin End -->
        
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
            <style>
                .jssora051 {display:block;position:absolute;cursor:pointer;}
                .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
                .jssora051:hover {opacity:.8;}
                .jssora051.jssora051dn {opacity:.5;}
                .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
            </style>
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
            <!--#endregion Arrow Navigator Skin End -->
        </div>
        <!-- Jssor Slider End -->
	    </div>
	    
	    <script>
	        jQuery(document).ready(function ($) {
	            var options = {
	                $AutoPlay: 1,                                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
	                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
	                $Idle: 5000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
	                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
	
	                $ArrowKeyNavigation: 1,   			                //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
	                $SlideEasing: $Jease$.$OutQuint,                    //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
	                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
	                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
	                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
	                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
	                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
	                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
	                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
	                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
	
	                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
	                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
	                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
	                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
	                },
	
	                $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
	                    $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
	                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
	                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
	                    $SpacingX: 12,                                  //[Optional] Horizontal space between each item in pixel, default value is 0
	                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
	                }
	            };
	
	            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
	
	            //responsive code begin
	            //you can remove responsive code if you don't want the slider scales while window resizing
	            function ScaleSlider() {
	                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
	                if (parentWidth) {
	                    jssor_slider1.$ScaleWidth(parentWidth - 0);
	                }
	                else
	                    window.setTimeout(ScaleSlider, 30);
	            }
	            ScaleSlider();
	
	            $(window).bind("load", ScaleSlider);
	            $(window).bind("resize", ScaleSlider);
	            $(window).bind("orientationchange", ScaleSlider);
	            //responsive code end
	        });
	    </script>
	    
	    <div class="thuong-hieu">
	    	<div class="cup-thuong">
	    		<div class="border-circle">
	    			<img src="../resources/img/icon/trophy.png" class="icon-thuong-hieu"/>
	    		</div>
	    		<div class="text-thuong-hieu">
	    			<p class="thuong-hieu-title">10+ SẢN PHẨM CHẤT LƯỢNG</p>
	    			<p class="thuong-hieu-description">Hàng chục loại sản phẩm được nhập khẩu chính hãng và được kiểm tra nghiêm ngặt</p>
	    		</div>
	    	</div>
	    	
	    	<div class="huy-chuong">
	    		<div class="border-circle">
	    			<img src="../resources/img/icon/certificate.png" class="icon-thuong-hieu"/>
	    		</div>
	    		<div class="text-thuong-hieu">
	    			<p class="thuong-hieu-title">CHẤT LƯỢNG HÀNG ĐẦU</p>
	    			<p class="thuong-hieu-description">Chúng tôi chuyên phân phối các loại loa bluetooth, điện thoại mini... 
    			Với chữ tín đặt lên hàng đầu, sản phẩm của chúng tôi luôn có chất lượng tốt nhất</p>
	    		</div>
	    	</div>
	    	
	    	<div class="hanh-trinh">
	    		<div class="border-circle">
	    			<img src="../resources/img/icon/gia.png" class="icon-thuong-hieu" style="margin-top: 15%"/>
	    		</div>
	    		<div class="text-thuong-hieu">
	    			<p class="thuong-hieu-title">GIÁ TỐT NHẤT</p>
	    			<p class="thuong-hieu-description">Chúng tôi cam kết phân phối tới quý khách hàng những sản phẩm chất lượng với giá tốt nhất 
	    			</p>
	    		</div>
	    	</div>
	    </div>
        
        <div class="su-menh">
	    	<div class="img-su-menh">
	    		<img src="../resources/img/banner/su-menh.jpg" style="width: 100%"/>
	    	</div>
	    	<div class="text-su-menh">
	    		<p class="title-su-menh">SỨ MỆNH CỦA CHÚNG TÔI</p>
	    		<p class="description-su-menh">Phụ Kiện PT phấn đấu trở thành nhà cung cấp sản phẩm và phụ kiện công nghệ được tin cậy nhất Việt Nam.<br/>
			Phụ kiện PT là người bạn trung thành, luôn lắng nghe và thấu hiểu để tư vấn, cung cấp kịp thời những sản phẩm - dịch vụ, 
				đáp ứng mọi nhu cầu hợp lý của khách hàng, mang lại sự hài lòng cho khách hàng</p>
	    	</div>
	    </div>
	    
	    <div class="chat-luong">
	    	<div class="text-chat-luong">
	    		<p class="title-chat-luong">UY TÍN CHẤT LƯỢNG HÀNG ĐẦU</p>
	    		<p class="description-chat-luong">
	    			Phụ kiện PT hợp tác với các đối tác trong và ngoài nước để làm chủ và đi đầu các sản phẩm công nghệ mới nhất. 
    			Chúng tôi đã xây dựng được đội ngũ giàu tri thức, kỷ luật cao, có tinh thần đoàn kết - nhất trí, 
    			năng động - sáng tạo trong tư duy và hành động, cống hiến hết mình trong công việc.
	    		</p>
	    	</div>
	    	<div class="img-chat-luong">
	    		<img src="../resources/img/banner/chat-luong.jpg" style="width: 100%"/>
	    	</div>
	    </div>
	    
	    <div class="keu-goi">
	    	<div class="text-keu-goi">
	    		<p class="title-keu-goi">HÃY CÙNG CHÚNG TÔI MỞ RA THÀNH CÔNG MỚI</p>
	    		<p class="description-keu-goi">Bạn đang muốn kinh doanh các sản phẩm hải sản đóng gói, mực khô, cá khô v..v</p>
	    	</div>
	    	<div class="goi-ngay center-div">
	    		<div class="form-goi-ngay ">
	    			<p class="text-goi-ngay">GỌI NGAY 036.381.0003</p>
	    		</div>
	    	</div>
	    </div>
	    
        <?php
            include("footer.php");
        ?>
    </body>
</html>
