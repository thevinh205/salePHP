<?php 
    include("config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
        <script src="/static/js/jquery.min.js"></script>
        <script src="/static/js/common.js"></script>
    </head>
    <body>
<!--        <div class="outerwapper" style="background: url(http://s.baomoi.xdn.vn/web/styles/img/hoa-dao.png?v0.10) no-repeat;     background-position: calc(50% - 574px) 0; height: 1000px">-->
            <div class="outerwapper">
            <?php include 'template/header.php';?>
            <div class="content">
                <div class="widget-title">
                    <div style="text-align: center;">
                    <span style="color: blue;font-size: 25px;">
                        <b>PHÂN PHỐI PHỤ KIỆN VÀ ĐỒ CHƠI GIÁ TỐT NHẤT</b> <br/>
                        <b>GIAO HÀNG TOÀN QUỐC, GIAO HÀNG DÙ CHỈ 1</b><br/>
						<b>PHÍ SHIP HỒ CHÍ MINH: 20K</b> <br/>
						<b>PHÍ SHIP TỈNH THÀNH KHÁC: 25K->40K TÙY KHU VỰC</b>
                    </span></div><br>
                    <div style="text-align: center;">
                    <span style="color: red; font-size: 35px;"><b>PHỤ KIỆN VT<br>A34 QL22, PHƯỜNG TRUNG MỸ TÂY, Q.12, HCM</b></span></div>
                    <div style="text-align: center;">
                    <br></div>
                    <div style="text-align: center;">
                    <span style="color: blue; font-size: x-large;">GIÁ LUÔN LUÔN THẤP NHẤT - CẠNH TRANH NHẤT - BẢO HÀNH ĐỔI MỚI</span></div>
                    <div style="text-align: center;">
                    <span style="color: blue; font-size: x-large;">MUA SỐ LƯỢNG NHIỀU GIÁ CÀNG RẺ</span></div>
                    <div style="text-align: center;">
                    <br></div>

                    <div style="text-align: center;">
                    <span style="font-size: x-large;background-color: yellow;color:red"><b>THÔNG TIN HÀNG HÓA VÀ GIÁ GIẢM CẬP NHẬT HÀNG NGÀY TRÊN WEBSITE NÀY<br>Đặt hàng qua điện thoại: 0166.381.0003 (Mr. Vinh) hoặc Zalo 0166.381.0003</b></span></div>

                    <br>
                    <div style="text-align: center;">
                    <span style="font-size: large;color:blue"><b>Đặt hàng qua mail: thevinh205@gmail.com</b></span></div><br>
                    <div style="text-align: center;">
                    <div style="text-align: center;">
                    <span style="font-size: x-large;color: RED"><b>THỜI GIAN LÀM VIỆC:<br>8h đến 21h hằng ngày</b></span></div>
                    <div style="text-align: center;">
                    </div><br>

                    <br><div style="text-align: center;">
                    <span style="font-size: large;"><b>-------*-------</b></span></div><br>

                    <br>
                    <div style="text-align: center;"><span style="font-size: large;"><b><span style="color: #A21C1C;"><b>Thông báo:</b> Khách ở nội thành HCM mua hàng vẫn được giao hàng thu tiền tận nơi bằng cách nhắn tin đặt hàng qua số điện thoại 0166.381.0003 hoặc gửi mail đặt hàng vào thevinh205@gmail.com. Khách ở Tỉnh đặt hàng với hóa đơn trên 500k và phải chuyển khoản trước đủ hết tiền hàng (cộng phí gửi nếu có) thì cửa hàng mới gửi hàng được. Kính mong quý khách hàng ở xa thông cảm!</span></b></span></div><br>
                </div>
                    
                <div class="product-list">
                    <h2 class="title">HÀNG MỚI VỀ LẠI + MẪU MỚI</h2>
                </div>
                    
                <center>
                    <table border="1" bordercolor="#BABABA" class="cms_table_grid" width="100%" align="center" style="border-color: #5bc0eb;background: #fffdcc;">
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;">
                                    <b style="text-align:center;background-color: yellow;color:red;font-size: 25px;">HÀNG MỚI VỀ LẠI + MẪU MỚI (CẬP NHẬT THƯỜNG XUYÊN)</b>
                                </td>
                            </tr>
                            <?php
                                 $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1;";
                                  $result=mysqli_query($con,$sql);
                                  
                                   while($tv_2=mysqli_fetch_array($result))
                                    {
                                        echo "<tr valign='top'>";
                                        echo    "<td style='text-align: center; width: 30%'>";
                                        echo        "<a href='javascript:void(0)' imageanchor='1'>";
                                        echo            "<img border='0' src='resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' alt='".$tv_2['name']."' title='".$tv_2['name']."' style='max-width: 300px; max-height: 300px'></a>";
                                        echo    "</td>";
                                        echo    "<td align='center' style='width: 15%'>";
                                        echo        "<span><font size='4'><b><font color='purple'>".substr($tv_2['price_sell'], 0, -3)."k</font></b> </font></span>";
                                        if($tv_2['count'] == 0) {
                                            echo "<br/>";
                                            echo "<span><font size='4'><b><font color='red'>(Tạm hết)</font></b></font></span>";
                                        }
                                        echo    "</td>";
                                        echo    "<td style='width: 40%'>";
                                        echo        "<span>";
                                        echo            "<font size='4'><b><span title='".$tv_2['name']."'>".$tv_2['name']."</span></b> </font>";
//                                        echo            "<b><font color='green' size='3' style='background-color: yellow'> MỚI VỀ HÀNG 30/11</font></b>";
                                        echo        "</span>";
                                        echo    "</td>";
                                        echo    "<td align='center' style='width: 15%'>";
                                        echo        "<span><font size='3'><b><font color='#000'>$tv_2[guarantee]</font></b></font></span>";
                                        echo    "</td>";
                                        echo "</tr>";
                                    }
                            ?>
<!--                            <tr valign="top">
                                <td style="text-align: center; width: 30%">
                                    <a href="javascript:void(0)" imageanchor="1">
                                        <img border="0" src="resources/img/sanpham/cap-nhieu-dau.jpg" alt="Cáp rút 4 đầu" title="Cáp rút 4 đầu" style="max-width: 450px"></a>
                                </td>
                                <td align="center" style="width: 15%">
                                    <span><font size="4"><b><font color="purple">29k</font></b></font></span>
                                </td>
                                <td style="width: 40%">
                                    <span>
                                        <font size="4"><b><a href="http://www.phukienvt.com" title="Cáp rút 4 đầu" target="_blank">Cáp <font color="red"> rút 4 đầu</font></a></b> </font>
                                        <b><font color="green" size="3" style="background-color: yellow"> MỚI VỀ HÀNG 30/11</font></b>
                                    </span>
                                </td>
                                <td align="center" style="width: 15%">
                                    <span><font size="3"><b><font color="#000">TEST</font></b></font></span>
                                </td>
                            </tr>-->
                        </tbody>
                    </table>
                </center>
                <?php include 'template/footer.php';?> 
            </div>
        </div>
        
        <script type="text/javascript">
            function add_chatinline(){var hccid=82244800;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}add_chatinline(); 
        </script>
    </body>
</html>
