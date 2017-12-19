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
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
        <?php
            $productId = $_POST['productId'];
            $productName = $_POST['productName'];
            $shopId = $_POST['shopId'];
            $sql="SELECT p.id, name, price_sell, avatar FROM shop_party_relationship sp LEFT JOIN product p on sp.product_id=p.id where sp.shop_id=$shopId and p.id LIKE '%$productId%' and name like '%$productName%'";
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
                echo    "<td  class='priceSell numbers'>$tv_2[price_sell]</td>";
                echo    "<td><input type='number' class='count'/></td>";
                echo    "<td style='width: 110px; text-align: center'>";
                echo        "<a href='javascript:void(0)' style='margin-right: 10px' title='Thêm' onclick='addProductToShop(this)'>";
                echo            "<i class='glyphicon glyphicon-plus'></i>";
                echo        "</a>";
                echo    "</td>";
                echo "</tr>";
                $index++;
            }
        ?>
    </tbody>
</table>