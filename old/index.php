<?php 
    include("../config.php");
?>
<html>
    <head>
        <link rel="icon" type="image/gif" href="resources/img/icon/long-den.jpg" />
    </head>
    <body>
<!--        <div class="outerwapper" style="background: url(http://s.baomoi.xdn.vn/web/styles/img/hoa-dao.png?v0.10) no-repeat;     background-position: calc(50% - 574px) 0; height: 1000px">-->
            <div class="outerwapper">
            <?php include '../template/header.php';?>
            <div class="content">
                <div class="widget-title">
                    <div style="text-align: center;">
                    <span style="color: blue;font-size: 35px;">
                        <b>PHÂN PHỐI PHỤ KIỆN VÀ ĐỒ CHƠI GIÁ TỐT NHẤT</b> <br/>
                        <b>GIAO HÀNG TOÀN QUỐC, GIAO HÀNG DÙ CHỈ 1</b><br/>
						<b>PHÍ SHIP HỒ CHÍ MINH: 20K</b> <br/>
						<b>PHÍ SHIP TỈNH THÀNH KHÁC: 30k</b>
                    </span></div><br>
                    <div style="text-align: center;">
                    <span style="color: red; font-size: 45px;"><b>PHỤ KIỆN VT</b></span></div>
                    <div style="text-align: center;">
                    <br></div>
                    <div style="text-align: center;">
                    <span style="color: blue; font-size: 40px;">GIÁ LUÔN LUÔN THẤP NHẤT - CẠNH TRANH NHẤT - BẢO HÀNH ĐỔI MỚI</span></div>
                    <div style="text-align: center;">
                    <span style="color: blue; font-size: 40px;">MUA SỐ LƯỢNG NHIỀU GIÁ CÀNG RẺ</span></div>
                    <div style="text-align: center;">
                    <br></div>
                    
                    <div style="text-align: center;">
                    <span style="font-size: 40px;color:blue"><b>Đặt hàng qua mail: thevinh205@gmail.com</b></span></div><br>
                    <div style="text-align: center;">
                    <div style="text-align: center;">
                    <span style="font-size: 40px;color: RED"><b>THỜI GIAN LÀM VIỆC:<br>8h đến 21h hằng ngày</b></span></div>
                    <div style="text-align: center;">
                    </div><br>

                    <br><div style="text-align: center;">
                    <span style="font-size: large;"><b>-------*-------</b></span></div><br>
                </div>
                    
                <center>
                    <table border="1" bordercolor="#BABABA" class="cms_table_grid" width="100%" align="center" style="border-color: #5bc0eb;background: #fffdcc;">
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;">
                                    <b style="text-align:center;background-color: yellow;color:red;font-size: 25px;">HÀNG MỚI VỀ LẠI + MẪU MỚI (CẬP NHẬT THƯỜNG XUYÊN)</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; font-size:40px; font-weight: bold">Hình ảnh</td>
                                <td style="text-align:center; font-size:40px; font-weight: bold">Giá</td>
                                <td style="text-align:center; font-size:40px; font-weight: bold">Tên</td>
                                <td style="text-align:center; font-size:40px; font-weight: bold">Bảo hành</td>
                            </tr>
                            <?php
                                 $sql="SELECT p.id, p.name, p.price_sell, p.avatar, sp.count, p.guarantee FROM shop_party_relationship sp left join product p on sp.product_id=p.id where sp.type='product' and p.show_web=1;";
                                  $result=mysqli_query($con,$sql);
                                   while($tv_2=mysqli_fetch_array($result))
                                    {
                                        echo "<tr valign='top'>";
                                        echo    "<td style='text-align: center; width: 30%'>";
                                        echo        "<a href='detail.php?product_id=".$tv_2['id']."' imageanchor='1'>";
                                        echo            "<img border='0' src='../resources/img/sanpham/".$tv_2['id']."/".$tv_2['avatar']."' alt='".$tv_2['name']."' title='".$tv_2['name']."' style='max-width: 300px; max-height: 300px'></a>";
                                        echo    "</td>";
                                        echo    "<td align='center' style='width: 15%'>";
                                        echo        "<span><font size='7'><b><font color='purple'>".substr($tv_2['price_sell'], 0, -3)."k</font></b> </font></span>";
                                        if($tv_2['count'] == 0) {
                                            echo "<br/>";
                                            echo "<span><font size='5'><b><font color='red'>(Tạm hết)</font></b></font></span>";
                                        }
                                        echo    "</td>";
                                        echo    "<td style='width: 40%'>";
                                        echo        "<span>";
                                        echo        "<a href='detail.php?product_id=".$tv_2['id']."' imageanchor='1'>";
                                        echo            "<font size='7'><b><span title='".$tv_2['name']."'>".$tv_2['name']."</span></b> </font>";
//                                        echo            "<b><font color='green' size='3' style='background-color: yellow'> MỚI VỀ HÀNG 30/11</font></b>";
                                        echo        "</a>";
                                        echo        "</span>";
                                        echo    "</td>";
                                        echo    "<td align='center' style='width: 15%'>";
                                        echo        "<span><font size='7'><b><font color='#000'>$tv_2[guarantee]</font></b></font></span>";
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
    </body>
</html>
