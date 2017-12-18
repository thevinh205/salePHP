<!DOCTYPE HTML>
<html>
	<?php 
	    include("../config.php");
	?> 
    <h2 class="pull-left">Danh sách sản phẩm</h2> 
    <button type="button" class="btn btn-info pull-right button-add" data-toggle="modal" 
            data-target="#addProduct" title="Thêm mới sản phẩm" onclick="showAddProduct()">    
        <i class="glyphicon glyphicon-plus"></i>
    </button>
    
    <table class="table table-bordered">
      <thead>
        <tr>
            <th>Stt</th>
            <th>Hình ảnh</th>
            <th>Mã sản phẩm</th>
            <th>Tên</th>
            <th>Loại</th>
            <th>Giá nhập</th>
            <th>Giá bán</th>
            <th style="text-align: center">Hành động</th>
        </tr>
      </thead>
      <tbody>
      	<?php
      		$productId = $_POST['productId'];
      		$productName = $_POST['productName'];
      		$page = $_POST['page'] - 1;
      		$offset = $page * 30;
	    	$sql="SELECT id, name, price_sell, price_buy, avatar, product_type, category_name FROM product p where name LIKE '%$productName%' and id LIKE '%$productId%' LIMIT $offset,30";
	        $result=mysqli_query($con,$sql);
	        $index = $page*30 + 1;
	        while($tv_2=mysqli_fetch_array($result)){
                    echo "<tr id='$tv_2[id]'>";
                    echo    "<td >$index</td>";
                    echo    "<td>";
                    echo        "<img src='../resources/img/sanpham/$tv_2[id]/$tv_2[avatar]' width='100' height='100'/>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='productId'>$tv_2[id]</span>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='productName'>$tv_2[name]</span>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='productType'>$tv_2[category_name]</span>";
                    echo        "<input type='hidden' th:value='$tv_2[product_type]' class='productTypeId'></input>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='priceBuy numbers'>$tv_2[price_buy]</span>"	;
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='priceSell numbers'>$tv_2[price_sell]</span>";	
                    echo    "</td>";
                    echo    "<td style='width: 110px; text-align: center'>";
                    echo        "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='showEditProduct(this)'>";
                    echo            "<i class='glyphicon glyphicon-edit' data-toggle='modal' data-target='#editProduct'></i>";
                    echo        "</a>";
                    echo        "<a href='javascript:void(0)' onclick='linkDeleteProduct(this)'>";
                    echo            "<i class='glyphicon glyphicon-remove' title='Xóa' data-toggle='modal' data-target='#deleteProduct'></i>";
                    echo        "</a>";
                    echo    "</td>";
                    echo "</tr>";
                    $index++;
          	}
	    ?>
      </tbody>
    </table>
    
    
    <div class="pagination">
    	<?php
    		$sql="SELECT count(*) as total FROM product p where name LIKE '%$productName%' and id LIKE '%$productId%'";
	        $result=mysqli_query($con,$sql);
	        $data=mysqli_fetch_assoc($result);
	        $totalPage = $data['total']/30;
	        if($data['total']%30 > 0)
	        	$totalPage +=1;
	       	for($i=1; $i<=$totalPage; $i++) {
		       	if(($i-1) == $page)
		        	echo "<a href='javascript:void(0)' class='page active'>$i</a>";
		       	else
		       		echo "<a href='javascript:void(0)' class='page gradient' onclick='loadProductTable($i)'>$i</a>";
	        }
        	
        ?>
    </div>
</html>