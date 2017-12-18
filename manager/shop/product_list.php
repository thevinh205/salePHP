<?php 
    include("../config.php");
?>
<div>
    <div class="form-search">
        <span class="title-header">Tìm kiếm sản phẩm</span>
        <form>
            <input type="hidden" name="shopId" th:value="${shop.id}"/>
            <div class="form-group" style="margin-top: 10px;">
                <label class="form-control-label">Mã sản phẩm</label>
                <input type="text" class="form-control" name="productId" value="<?php echo $_POST['productId'] ?>"/>
            </div>
            <div class="form-group">
                <label class="form-control-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="productName" value="<?php echo $_POST['productName'] ?>"/>
            </div>
            <div class="form-group">
                <label class="form-control-label">Loại</label>
                <select class="form-control" name="productType">
                    <?php
                        $sql2="SELECT type_id, type_name FROM product_type";
                        $result2=mysqli_query($con,$sql2);
                        while($tv_3=mysqli_fetch_array($result2)){
                            if($tv_3[type_id] == $_POST['productType']){
                                echo "<option selected='selected' value='$tv_3[type_id]'>$tv_3[type_name]</option>";
                           }
                           else{
                                echo "<option value='$tv_3[type_id]'>$tv_3[type_name]</option>";
                           }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <a href="javascript:void(0)" class="btn btn-info btnSearchProduct">
                    <span class="glyphicon glyphicon-search"></span> Tìm kiếm
                </a>
            </div>
        </form>
    </div>
    <div class="content-list">
        <h2 class="pull-left">Danh sách sản phẩm</h2> 
        <button type="button" class="btn btn-info pull-right button-add" data-toggle="modal" 
                data-target="#addProduct" title="Thêm mới sản phẩm">    
            <i class="glyphicon glyphicon-plus"></i>
        </button>
        <table class="table table-bordered">
          <thead>
            <tr>
                <th style="width: 50px; text-align: center">Stt</th>
                <th>Hình ảnh</th>
                <th>Mã sản phẩm</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>Giá nhập</th>
                <th>Giá bán</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php
      		$productId = $_POST['productId'];
      		$productName = $_POST['productName'];
                $shopId = $_POST['shopId'];
                $productType = $_POST['productType'];
                if($productType == 'all')
                    $productType = '';
      		$page = $_POST['page'] - 1;
      		$offset = $page * 30;
	    	$sql="SELECT p.id, name, price_sell, price_buy, avatar, product_type, category_name, count FROM  shop_party_relationship sp LEFT JOIN product p on p.id=sp.product_id where sp.shop_id='$shopId' and name LIKE '%$productName%' and p.id LIKE '%$productId%' and product_type like '%$productType%' LIMIT $offset,30";
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
                    echo    "<td class='text-center'>";
                    echo    "<span class='count-product-text'>$tv_2[count]</span>";
                    echo    "<input value='$tv_2[count]' class='form-control hide count-product-input numbers' style='text-align: center'/>";
                    echo    "</td>";
                    echo    "<td style='width: 110px; text-align: center'>";
                    echo        "<div class='btn-edit-product hide'>";
                    echo            "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='editCountProductAction(this)'>";
                    echo                "<i class='glyphicon glyphicon-ok-sign'></i>";
                    echo            "</a>";
                    echo            "<a href='javascript:void(0)' class='linkDeleteProduct' onclick='hideEditCountProduct(this)'>";
                    echo                "<i class='glyphicon glyphicon-remove-sign' title='Hủy bỏ'></i>";
                    echo            "</a>";
                    echo        "</div>";
                    echo        "<div class='btn-dlt-product'>";
                    echo            "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='showEditCountProduct(this)'>";
                    echo                "<i class='glyphicon glyphicon-edit'></i>";
                    echo            "</a>";
                    echo            "<a href='javascript:void(0)' class='linkDeleteProduct'>";
                    echo                "<i class='glyphicon glyphicon-remove' title='Xóa' data-toggle='modal' data-target='#deleteProduct'></i>";
                    echo            "</a>";
                    echo        "</div>";
                    echo    "</td>";
                    echo "</tr>";
                    $index++;
          	}
            ?>
          </tbody>
        </table>
        <div class="pagination">
            <?php
                $sql="SELECT count(*) as total FROM  shop_party_relationship sp LEFT JOIN product p on p.id=sp.product_id where sp.shop_id='$shopId' and name LIKE '%$productName%' and p.id LIKE '%$productId%' and product_type like '%$productType%'";
                $result=mysqli_query($con,$sql);
                $data=mysqli_fetch_assoc($result);
                $totalPage = $data['total']/30;
                if($data['total']%30 > 0)
                        $totalPage +=1;
                for($i=1; $i<=$totalPage; $i++) {
                    if(($i-1) == $page)
                        echo "<a href='javascript:void(0)' class='page active'>$i</a>";
                    else
                        echo "<a href='javascript:void(0)' class='page gradient' onclick='searchProductShop($i)'>$i</a>";
                }
            ?>
        </div>
    </div>
</div>

<!-- Delete product -->
<div class="modal fade" id="deleteProduct" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bạn có muốn xóa sản phẩm <span style="font-weight: bold" id="productNameDelete"></span></h4>
            </div>
            <div class="modal-footer">
                <form action="#" th:action="@{delete}" method="post">
                    <input type="hidden" value="" name="productIdDelete" id="productIdDelete"/>
                    <button type="button" class="btn " data-dismiss="modal">Hủy bỏ</button>
                    <a href="javascript:void(0)" class="btn btn-danger deleteProductAction">Xóa</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add new product -->
<div class="modal fade" id="addProduct" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" style="max-height: 700px; overflow-y: scroll;">
        <div class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Thêm sản phẩm tới shop</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Mã sản phẩm</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="productIdAdd"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Tên sản phẩm</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="productNameAdd"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-success search-product-add">Tìm</a>
            </div>
        </div>
        <div class="list-product-add">
        </div>
    </div>

  </div>
</div>
    
<script src="../static/js/shop-product-list.js"></script>
<script src="../static/js/common.js"></script>