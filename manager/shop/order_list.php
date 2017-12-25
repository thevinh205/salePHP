<?php 
    include("../config.php");
    session_start();
?>
<div>
    <div class="form-search">
        <span class="title-header">Tìm kiếm đơn hàng</span>
        <input type="hidden" name="shopId" th:value="${shop.id}"/>
        <div class="form-group row" style="margin-top: 10px;">
			<div class="col-sm-6">
				<label class="col-sm-4">Mã đơn hàng:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="orderId" value="<?php echo $_POST['orderId']; ?>"/>
				</div>
			</div>
			<div class="col-sm-6">
				<label class="col-sm-4">Mã sản phẩm:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="productId" value="<?php echo $_POST['productId']; ?>"/>
				</div>
			</div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="col-sm-4">Từ ngày:</label>
                <div class="col-sm-8">
                    <input type="date" name="fromDate" class="form-control" value="<?php echo $_POST['fromDate']; ?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="col-sm-4">Đến ngày:</label>
                <div class="col-sm-8">
                    <input type="date" name="toDate" class="form-control" value="<?php echo $_POST['toDate']; ?>"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <a href="javascript:void(0)" class="btn btn-info btnSearchOrder">
                <span class="glyphicon glyphicon-search"></span> Tìm kiếm
            </a>
        </div>
    </div>
    <div class="content-list">
        <h2 class="pull-left">Danh sách đơn hàng</h2> 
        <button type="button" class="btn btn-info pull-right button-add" data-toggle="modal" 
                data-target="#popupCreateOrder" title="Tạo đơn hàng">    
            <i class="glyphicon glyphicon-plus"></i>
        </button>
        <table class="table table-bordered">
          <thead>
            <tr>
                <th style="width: 50px; text-align: center">Stt</th>
                <th>Mã đơn hàng</th>
                <th>Ngày tạo</th>
                <th>Sản phẩm</th>
                <th>Nhân viên</th>
                <th>Tổng hóa đơn</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
          </thead>
          <tbody
            <?php 
                $shopId = $_POST['shopId'];
				$productId = $_POST['productId'];
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                if($fromDate == '')
                    $fromDate = 0;
                $page = $_POST['page'] - 1;
      		$offset = $page * 30;
                $sql = "";
                if($toDate != ''){
                    $toDate = date('Y-m-d',strtotime($toDate . "+1 days"));
                    $sql="SELECT DISTINCT od.id, od.create_date, m.name, total_price, od.status, od.employee_username FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<'$toDate' LIMIT $offset,30";
                } else {
                    $sql="SELECT DISTINCT od.id, od.create_date, m.name, total_price, od.status, od.employee_username FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<NOW() LIMIT $offset,30";
                }
                
	        $result=mysqli_query($con,$sql);
	        $index = $offset + 1;
                $totalPriceOrder = 0;
                while($tv_2=mysqli_fetch_array($result)){
                    $totalPriceOrder += $tv_2['total_price'];
                    echo "<tr>";
                    echo    "<td class='text-center'>$index</td>";
                    echo    "<td class='orderId'>$tv_2[id]</td>";
                    echo    "<td>$tv_2[create_date]</td>";
                    echo    "<td><a href='javascript:void(0)' data-toggle='modal' data-target='#popupOrderProductList' onclick='showListProductOfOrder(this)'>Sản phẩm</a></td>";
                    echo    "<td class='employee'>$tv_2[name]</td>";
                    echo    "<td>";
                    echo        "<span class='order-total-text numbers'>$tv_2[total_price]</span>";
                    echo        "<input value='$tv_2[total_price]' class='form-control order-total-input numbers hide' style='text-align: center'/>";
                    echo    "</td>";
                    echo    "<td>";
                    echo        "<input type='hidden' value='$tv_2[status]' class='order-status-text'/>";
                    echo        "<select class='form-control status-order' name='statusList' disabled='disabled'>";
                    $sql2="SELECT s.key, s.name FROM status s where type='order'";
                    $result2=mysqli_query($con,$sql2);
                    while($tv_3=mysqli_fetch_array($result2)){
                        if($tv_3['key'] == $tv_2['status']){
                            echo "<option selected='selected' value='$tv_3[key]'>$tv_3[name]</option>";
                        }
                        else{
                            echo "<option value='$tv_3[key]'>$tv_3[name]</option>";
                        }
                    }
                    echo        "</select>";
                    echo    "</td>";
                    echo    "<td style='width: 110px; text-align: center'>";
                    if($_SESSION["role"] == 'manager' || $tv_2['employee_username'] == $_SESSION["username"]) {
                        echo        "<div class='btn-edit-order hide'>";
                        echo            "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='editOrderAction(this)'>";
                        echo                "<i class='glyphicon glyphicon-ok-sign'></i>";
                        echo            "</a>";
                        echo            "<a href='javascript:void(0)' class='linkDeleteProduct' onclick='cancelEditOrder(this)'>";
                        echo                "<i class='glyphicon glyphicon-remove-sign' title='Hủy bỏ'></i>";
                        echo            "</a>";
                        echo        "</div>";
                        echo        "<div class='btn-show-edit-order'>";
                        echo            "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='showEditOrder(this)'>";
                        echo                "<i class='glyphicon glyphicon-edit'></i>";
                        echo            "</a>";
                        echo        "</div>";
                        echo    "</td>";
                    }
                    echo "</tr>"; 
                    $index++;
                }
            ?>
            
          </tbody>
        </table>
		
		<div style="font-weight: bold">
            <span>Tổng cộng:</span>
            <span class="price-total-order numbers"><?php echo $totalPriceOrder; ?></span> VNĐ
        </div>
		
        <div class="pagination">
            <?php
                if($toDate != ''){
                    $sql="SELECT count(*) as total FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<'$toDate'";
                } else {
                    $sql="SELECT count(*) as total FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<NOW()";
                }
                $result=mysqli_query($con,$sql);
                $data=mysqli_fetch_assoc($result);
                $totalPage = $data['total']/30;
                if($data['total']%30 > 0)
                        $totalPage +=1;
                for($i=1; $i<=$totalPage; $i++) {
                    if(($i-1) == $page)
                        echo "<a href='javascript:void(0)' class='page active'>$i</a>";
                    else
                        echo "<a href='javascript:void(0)' class='page gradient' onclick='searchOrderShop($i)'>$i</a>";
                }
            ?>
        </div>
        
    </div>
</div>

<!-- Create order -->
<div class="modal fade" id="popupCreateOrder" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" style="max-height: 700px; overflow-y: scroll;">
        <div class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tạo đơn hàng</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h4 class="modal-title pull-left" style="width: 60%; padding-left: 15px">Danh sách sản phẩm</h4> 
                    <a class="btn btn-info pull-right btn-show-list-product" title="Thêm sản phẩm" 
                       data-toggle="modal" data-target="#popupAddProduct" href="javascript:void(0)" style="margin-right: 15px">    
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </div>
                <table class="table table-bordered list-product-order">
                    <thead>
                        <tr>
                            <th style="width: 50px; text-align: center">Stt</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th>Tổng</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
                <div style="font-weight: bold">
                    <span>Tổng cộng:</span>
                    <input class="price-total-add" value="0"/> VNĐ
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-success create-order" onclick="createOrderAction()">Tạo</a>
            </div>
        </div>
    </div>

  </div>
</div>

<!-- Add new product -->
<div class="modal fade" id="popupAddProduct" role="dialog">
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

<!-- product list of order -->
<div class="modal fade" id="popupOrderProductList" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" style="max-height: 700px; overflow-y: scroll;">
        <div class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Danh sách sản phẩm</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h4 class="modal-title pull-left" style="width: 60%; padding-left: 15px">Danh sách sản phẩm</h4> 
                </div>
                <div class="product-order-list">
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-danger create-order" data-dismiss="modal">Đóng</a>
            </div>
        </div>
    </div>

  </div>
</div>
    
<script src="../static/js/shop-order-list.js"></script>