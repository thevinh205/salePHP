<?php 
    include("../config.php");
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../resources/css/detail_mobile.css">
    </head>
    <body style="width: 1200px; min-height:116%; position:relative;">
         <?php 
		    include("header.php");
		?>
        
        <div style="width: 100%; text-align: center; background-color: #fff">
            <nav class="flex bread">
                <a href="./" class="navi item brdc">Trang chủ</a> 
                <a href="javascript:void(0)" class="navi item brdc">Phụ kiện</a> 
            </nav>
        </div>
        
        <div class="mainctn">
            <div class="productinfo">
                <?php
                	$link = $_SERVER['REQUEST_URI'];
					$link_array = explode('/',$link);
					$idString = end($link_array);
					$parts = explode('-', $idString);
					$id = $parts[count($parts)-1];
                	
                	$id = str_replace("-","_",$id);

                    echo "<input type='hidden' value='".$id."' id='product_id'/>";
                    $sql = "SELECT p.name, sp.count, p.avatar, p.price_sell, p.price_prom, p.prom, p.description FROM shop_party_relationship sp left join product p on sp.product_id = p.id where p.id='$id'";
                    $result=mysqli_query($con,$sql);
                    $data = mysqli_fetch_assoc($result);
                    $productName = $data['name'];
					echo " <title>$productName</title>";
                ?>
                
                <div class="gallery" data-id="112970" data-cate="42">
                    <div class="wrapslide">
                        <?php
                            echo "<img class='avatar pri-avatar' src='../resources/img/sanpham/".$id."/".$data['avatar']."' alt='' width='560' height='310'>";
                        ?>
                    </div>
                    <div class="colorandpic tele">
                        <ul>
                            
                            <?php 
                                $path    = "../resources/img/sanpham/".$id;
                                $files = scandir($path);
                                $i = 0;
                                foreach ($files as $file) {
                                    if($file != "." && $file != "..") {
                                        echo "<li class='gal'>";
                                        echo    "<a href='javascript:'>";
                                        if($i == 0) {
                                            echo        "<div class='img-selected'>";
                                            echo            "<img src='../resources/img/sanpham/".$id."/".$file."' onclick='changeImageShow(this)' class='img-first'>";
                                        } else {
                                            echo        "<div>";
                                            echo            "<img src='../resources/img/sanpham/".$id."/".$file."' onclick='changeImageShow(this)'>";
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
                            <p><span>Đổi trả sản phẩm lỗi miễn phí tại nhà trong 7 ngày</span></p>
                        </div>
                        <div>
                            <i class="iconict-gh"></i>
                            <p><span> Giao hàng toàn quốc </span></p>
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
                            <span>Chọn số lượng</span> 
                            <label> 
                                <span class="down">-</span> 
                                <input type="text" min="1" max="50" maxlength="2" name="txtQuantity" value="1"/> 
                                <span class="up">+</span> 
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
                            echo "<h3 class='brand'>Sản phẩm: <span style='font-weight: bold; font-size: 50px;'>".$data['name']."</span></h3>"; 
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
            
<!--            <div class="slide-right">
                <div class="box-item relative" style="width: 100%">
                    <h4 class="prorelative">Sản phẩm liên quan</h4>
                    <ul class="bxrelative flex" style="width: 100%">
                        <li class="prohv">
                            <a href="/dien-thoai-di-dong/nokia-61-plus">
                                <figure class="pic">
                                    <img width="200" height="200" alt="Nokia 6.1 Plus" class="view" src="https://cdn.tgdd.vn/Products/Images/42/167150/nokia-61-plus-2-200x200.jpg"/>
                                </figure>
                            </a>
                            <div class="prodsame">
                                <a href="/dien-thoai-di-dong/nokia-61-plus">
                                    <div class="riki-name active">Nokia 6.1 Plus</div>
                                </a>
                                <div class="prices">
                                    <span class="price">6.325.000₫</span> 
                                    <span class="line">6.590.000₫</span> 
                                    <label class="discount">4%</label>
                                </div>
                                <div class="itembuy prodebuy" onclick="window.location.href='/dien-thoai-di-dong/nokia-61-plus'" title="Nokia 6.1 Plus">XEM CHI TIẾT
                                </div> 
                            </div>
                        </li>
                        
                        <li class="prohv">
                            <a href="/dien-thoai-di-dong/xiaomi-mi-a2">
                                <figure class="pic">
                                    <img width="200" height="200" alt="Xiaomi Mi A2" class="view" src="https://cdn.tgdd.vn/Products/Images/42/182151/xiaomi-mi-a2-2-200x200.jpg">
                                </figure>
                            </a>
                            <div class="prodsame">
                                <a href="/dien-thoai-di-dong/xiaomi-mi-a2">
                                    <div class="riki-name active">Xiaomi Mi A2</div>
                                </a>
                                <div class="prices">
                                    <span class="price">6.420.000₫</span> 
                                    <span class="line">6.690.000₫</span> 
                                    <label class="discount">4%</label>
                                </div>
                                <div class="itembuy prodebuy" onclick="window.location.href='/dien-thoai-di-dong/xiaomi-mi-a2'" title="Xiaomi Mi A2">XEM CHI TIẾT</div>     
                            </div>
                        </li>
                    </ul>
                </div>
            </div>-->
        </div>
        <div style=" bottom:0">
            <?php 
                include("../footer.php");
				$con->close();
            ?>
        </div>
    </body>
</html>
