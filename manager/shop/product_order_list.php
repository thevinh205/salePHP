<?php 
    include("../config.php");
?>
<table class="table table-bordered">
    <thead>
      <tr>
          <th style="width: 50px; text-align: center">Stt</th>
          <th>Hình ảnh</th>
          <th>Mã sản phẩm</th>
          <th>Tên</th>
          <th>Giá</th>
          <th class="text-center">Số lượng</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $shopId = $_POST['shopId'];
            $orderId = $_POST['orderId'];
            $sql="SELECT p.id, name, price_sell, avatar, count FROM order_party_relationship op LEFT JOIN product p on op.product_id=p.id where op.shop_id=$shopId and op.order_id=$orderId";
            $result=mysqli_query($con,$sql);
            $index = 1;
            while($tv_2=mysqli_fetch_array($result)){
                echo "<tr>";
                echo    "<td class='text-center'>$index</td>";
                echo    "<td>";
                echo        "<img src='../../resources/img/sanpham/$tv_2[id]/$tv_2[avatar]' width='70' height='70'/>";
                echo    "</td>";
                echo    "<td class='productId'>$tv_2[id]</td>";
                echo    "<td class='productName'>$tv_2[name]</td>";
                echo    "<td  class='priceSell numbers-product'>$tv_2[price_sell]</td>";
                echo    "<td><span class='count'/>$tv_2[count]</span>";
                echo "</tr>";
                $index++;
            }
			$con->close();
        ?>
    </tbody>
</table>