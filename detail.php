<?php 
    include("config.php");
?>
<html>
	<head>
		<link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <link rel="stylesheet" type="text/css" href="resources/css/detail.css">
	</head>
    <body>
        <?php 
		    include("header.php");
            $link = $_SERVER['REQUEST_URI'];
    		$link_array = explode('/',$link);
   			$idString = end($link_array);
			$parts = explode('-', $idString);
			$id = $parts[count($parts)-1];

            echo "<input type='hidden' value='".$id."' id='product_id'/>";
            $sql = "SELECT p.name, sp.count, p.avatar, p.price_sell, p.price_prom, p.prom, p.description, p.category_name FROM shop_party_relationship sp left join product p on sp.product_id = p.id where p.id='$id'";
            $result=mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($result);
            $categoryName = $data['category_name'];
			echo "<title>$data[name]</title>";
        ?>
        
        
        <div style="width: 100%; text-align: center; background-color: #fff; margin-top: 80px">
            <nav class="flex bread">
                <a href="./" class="navi item brdc">Trang chủ</a> 
                <a href="javascript:void(0)" class="navi item brdc">Chi tiết</a> 
            </nav>
        </div>
        
        <div class="mainctn">
            <div class="productinfo">
                
                
                <div class="gallery" data-id="112970" data-cate="42">
                    <div class="wrapslide">
                        <?php
                            echo "<img class='avatar pri-avatar' src='resources/img/sanpham/".$id."/".$data['avatar']."' alt='' width='560' height='310'>";
                        ?>
                    </div>
                    <div class="colorandpic tele">
                        <ul>
                            
                            <?php 
                                $path    = "resources/img/sanpham/".$id;
                                $files = scandir($path);
                                $i = 0;
                                foreach ($files as $file) {
                                    if($file != "." && $file != "..") {
                                        echo "<li class='gal'>";
                                        echo    "<a href='javascript:'>";
                                        if($i == 0) {
                                            echo        "<div class='img-selected'>";
                                            echo            "<img src='resources/img/sanpham/".$id."/".$file."' onclick='changeImageShow(this)' class='img-first'>";
                                        } else {
                                            echo        "<div>";
                                            echo            "<img src='resources/img/sanpham/".$id."/".$file."' onclick='changeImageShow(this)'>";
                                        }
                                        echo        "</div>";
                                        echo    "</a>";
                                        echo "</li>";   
                                        $i++;
                                    }
                                }
                            ?>
                            
<!--                            <li class="gal">
                                <a href="javascript:" onclick="OpenPhotoSwipe(0)">
                                    <div>
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-vang-dong-2-2-180x120.jpg"> 
                                        <span class="imgcount">Xem<br>12 hình</span>
                                    </div>
                                </a>
                            </li>-->
                        </ul>
                    </div>
                </div>
                
                <div class="info">
                    <?php
                        echo "<h1 class='productname'>".$data['name']."</h1>";
                    ?>
                    <div class="boxprice">
                        <div class="prices">
                            <?php 
                                if($data['prom']) {
                                    $rateProm = round(($data['price_sell'] - $data['price_prom'])/$data['price_sell'] * 100);
                                    echo "<span class='new'><span class='numbers'>".$data['price_prom']."</span>₫</span>"; 
                                    echo "<span><span class='numbers line'>".$data['price_sell']."</span>₫</span>"; 
                                    echo "<span class='discount'>".$rateProm."%</span>";
                                } else {
                                    echo "<span class='new'><span class='numbers'>".$data['price_sell']."</span>₫</span>"; 
                                } 
                                    
                                if($data['count'] > 0)
                                    echo "<span class='status'> Còn hàng </span>";
                                else 
                                    echo "<span class='status'> Hết hàng</span>";
                            ?>
                            
                        </div>
                    </div>
                    <div class="policy">
                        <div>
                            <i class="iconict-bh"></i>
                            <p><span>Bảo hành chính hãng 12 tháng</span></p>
                        </div>
                        <div>
                            <i class="iconict-dt"></i>
                            <p><span>Đổi trả sản phẩm lỗi miễn phí tại nhà trong 7 ngày <a href="chinh-sach-doi-tra">(Xem chi tiết)</a></span></p>
                        </div>
                        <div>
                            <i class="iconict-gh"></i>
                            <p><span> Giao hàng toàn quốc </span> Nếu giao trễ, tặng phiếu mua hàng giá trị 100.000đ</p>
                        </div>
                    </div>
                    <div class="options">
                        <div class="color opt hide">
                            <span>Chọn mua màu</span>
                            <div id="color-shockprice" data-shockprice="false">
                                <input type="hidden" name="hdProductCode" value="0131491000852"> 
                                <a href="javascript:" data-code="0131491000852" class="active" data-name="Vàng đồng" title="Vàng đồng" data-position="midtop">
                                    <figure>
                                        <i class="icon-sticky"></i> 
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/112970/samsung-galaxy-j7-plus-gold-200-180x120.png" alt="Vàng đồng" width="50" height="50" data-color="16">
                                        <div class="sibovl"></div>
                                    </figure>
                                </a>
                            </div> 
                        </div>
                        <div class="quantity center opt">
                            <span>Chọn số lượng:</span> 
                            <label style="margin-top:10px"> 
                                <input type='button' class='minus down' value='-' onclick='reductionProductNumber(this)' style='top:15px;left: 100px;'/>
        						<input name="txtQuantity" class='input-dat-hang count-product' style='width:75px; margin-left: 10px' value="1"/>
        						<input type='button' class='plus up' value='+' onclick='increaseProductNumber(this)' style='top:-10px;left: 100px;'/>
                                
                            </label>
                        </div>
                        <span class="error hide">(*)Vui lòng chọn màu</span>
                    </div>
                    <div class="buttons">
                        <?php
                            echo "<a href='javascript:void(0)' class='btnorange buynowbtn buynow' title='Mua ".$data['name']."' onclick='addProductAndToCart()'>Chọn Mua</a>";
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="slide-left">
                <div class="boxcontent">
                    <div class="detail">
                        <?php 
                            echo "<h3 class='brand'>Sản phẩm: <span style='font-weight: bold; font-size: 20px;'>".$data['name']."</span></h3>"; 
                        ?>
                        
                        
                        <article class="description">
<!--                            <div class="short">
                                <h2 class="spec">Thông số kỹ thuật</h2>
                                <ul class="specs">
                                    <li>
                                        <span class="specname">Màn hình:</span>
                                        <span class="specval">Super AMOLED, 5.5", Full HD</span>
                                    </li>
                                    <li>
                                        <span class="specname">Hệ điều hành:</span>
                                        <span class="specval">Android 7.0</span>
                                    </li>
                                </ul>
                            </div>-->
                            
                            <div class="full">
                                <?php
                                
                                $description = preg_replace("/\r\n|\r|\n/",'<br/>',$data['description']);
                                    echo "<h2>".$description."</h2>";
                                ?>
                            </div>
                        </article>
                    </div>                     
                </div>
            </div>
            
            <div class="slide-right">
                <div class="box-item relative" style="width: 100%">
                    <h4 class="prorelative">Sản phẩm liên quan</h4>
                    <ul class="bxrelative flex" style="width: 100%">
                        <?php
                            $sql1 = "SELECT id, name, avatar, price_sell, price_prom, prom FROM product where id != '$id' and category_name = '$categoryName' and show_web=1 ORDER BY RAND() limit 4";
                            $result1=mysqli_query($con,$sql1);
                            while($tv_1=mysqli_fetch_array($result1)) {
                                echo "<li class='prohv'>";
                                echo    "<a href='detail.php?product_id=".$tv_1['id']."'>";
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
                                    echo            "<span class='price'><span>".$tv_1['price_prom']."</span>₫</span>";
                                    echo            "<span class='line'><span>".$tv_1['price_sell']."</span>₫</span>"; 
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
        </div>
        
        <?php 
            include("footer.php");
    		$con->close();
        ?>
    </body>
</html>
