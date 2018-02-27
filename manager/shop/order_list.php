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
                <label class="col-sm-4">Trạng thái:</label>
                <div class="col-sm-8">
                    <?php
                        echo "<select class='form-control status-order' name='statusSearch'>";
                        $sql2="SELECT s.key, s.name FROM status s where type='order'";
                        echo "<option value=''>Tất cả</option>";
                        $result2=mysqli_query($con,$sql2);
                        while($tv_3=mysqli_fetch_array($result2)){
                            if($tv_3['key'] == $_POST['status']){
                                echo "<option selected='selected' value='$tv_3[key]'>$tv_3[name]</option>";
                            }
                            else{
                                echo "<option value='$tv_3[key]'>$tv_3[name]</option>";
                            }
                        }
                        echo "</select>";
                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="col-sm-4">Khách hàng</label>
                <div class="col-sm-8">
                    <input type="text" name="customer" class="form-control" value="<?php echo $_POST['customer']; ?>"/>
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
                <th>Khách hàng</th>
                <th>SĐT</th>
                <th>Nhân viên</th>
                <th>Tổng hóa đơn</th>
                <th>Trạng thái</th>
                <th class="text-center">Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $orderId = $_POST['orderId'];
                $shopId = $_POST['shopId'];
		$productId = $_POST['productId'];
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                if($fromDate == '')
                    $fromDate = 0;
                $page = $_POST['page'] - 1;
                $customer = $_POST['customer'];
                $status = $_POST['status'];
                
      		$offset = $page * 30;
                $sql = "";
                if($toDate != ''){
                    $toDate = date('Y-m-d',strtotime($toDate . "+1 days"));
                    $sql="SELECT DISTINCT od.id, od.create_date, m.name, total_price, od.status, od.employee_username, od.customer_name, od.phone_number, od.address FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<'$toDate' and od.customer_name like '%$customer%' and od.status like '%$status%' order by create_date ASC";
                } else {
                    $sql="SELECT DISTINCT od.id, od.create_date, m.name, total_price, od.status, od.employee_username, od.customer_name, od.phone_number, od.address FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<NOW() and od.customer_name like '%$customer%' and od.status like '%$status%' order by create_date ASC";
                }
                if(trim($orderId) != '')
                    $sql = $sql." and od.id = $orderId";
                $sql = $sql." LIMIT $offset,30";
                
	        $result=mysqli_query($con,$sql);
	        $index = $offset + 1;
                $totalPriceOrder = 0;
                while($tv_2=mysqli_fetch_array($result)){
                    if($tv_2['status'] != 'cancle')
                        $totalPriceOrder += $tv_2['total_price'];
                    if($tv_2['status'] == 'handling') {
                        echo "<tr class='row-handling'>";
                    } else if($tv_2['status'] == 'cancle') {
                        echo "<tr class='row-cancle'>";
                    }else if($tv_2['status'] == 'new') {
                        echo "<tr class='row-new'>";
                    } else {
                        echo "<tr class='row-resolve'>";
                    }
                    echo    "<td class='text-center'>$index</td>";
                    echo    "<td class='orderId'>$tv_2[id]</td>";
                    echo    "<td class='create-date'>$tv_2[create_date]</td>";
                    echo    "<td>";
                    echo        "<span class='customer-name-text'>$tv_2[customer_name]</span>";
                    echo        "<input value='$tv_2[customer_name]' class='form-control customer-name-input hide'/>";
                    echo    "</td>";
                    echo    "<td>";
                    echo        "<span class='phone-number-text'>$tv_2[phone_number]</span>";
                    echo        "<input value='$tv_2[phone_number]' class='form-control phone-number-input hide'/>";
                    echo        "<span class='address-text hide'>$tv_2[address]</span>";
                    echo    "</td>";
                    echo    "<td class='employee'>$tv_2[name]</td>";
                    echo    "<td>";
                    echo        "<span class='order-total-text numbers'>$tv_2[total_price]</span>";
                    echo        "<input value='$tv_2[total_price]' class='form-control order-total-input numbers hide'/>";
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
                        echo            "<a href='javascript:void(0)' data-toggle='modal' data-target='#popupOrderProductList' onclick='showListProductOfOrder(this)' title='Danh sách sản phẩm' style='margin-right: 10px'>";
                        echo                "<i class='glyphicon glyphicon-th-list'></i>";
                        echo            "</a>";
                        echo            "<a href='javascript:void(0)' data-toggle='modal' data-target='#popupInvoice' onclick='showInvoice(this)' title='In hóa đơn'>";
                        echo                "<i class='glyphicon glyphicon-print'></i>";
                        echo            "</a>";
                        echo        "</div>";
                    }
                    echo    "</td>";
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
                    $sql="SELECT count(DISTINCT od.id) as total FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<'$toDate' and od.customer_name like '%$customer%' and od.status like '%$status%'";
                } else {
                    $sql="SELECT count(DISTINCT od.id) as total FROM order_header od left join member m on od.employee_username = m.username left join order_party_relationship op on od.id=op.order_id where od.shop_id= $shopId and op.product_id like '%$productId%' and od.create_date>='$fromDate' and od.create_date<NOW() and od.customer_name like '%$customer%' and od.status like '%$status%'";
                }
                 if(trim($orderId) != '')
                    $sql = $sql." and od.id = $orderId";
                $result=mysqli_query($con,$sql);
                $data=mysqli_fetch_assoc($result);
                $totalPage = $data['total']/30;
                if($data['total']%30 > 0)
                        $totalPage +=1;
                $totalPage = (int)$totalPage;
                echo "<a href='javascript:void(0)' class='page gradient' onclick='searchOrderShop(1)'>&laquo;</a>";
                if($page > 2)
                    echo "<a href='javascript:void(0)' class='page gradient'>...</a>";
                for($i=$page-1; $i<=$page+3; $i++) {
                    if((($i-1) == $page) && $i > 0 && $i <= $totalPage)
                        echo "<a href='javascript:void(0)' class='page active'>$i</a>";
                    else if($i > 0 && $i <= $totalPage)
                        echo "<a href='javascript:void(0)' class='page gradient' onclick='searchOrderShop($i)'>$i</a>";
                }
                if($page < $totalPage-3)
                    echo "<a href='javascript:void(0)' class='page gradient'>...</a>";
                echo "<a href='javascript:void(0)' class='page gradient' onclick='searchOrderShop($totalPage)'>&raquo;</a>";
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
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Tổng cộng (VNĐ):</label>
                            <div class="col-sm-8">
                                <input type="text" class="price-total-add form-control" value="0"/>
                            </div>
                        </div>  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Khách hàng:</label>
                            <div class="col-sm-8">
                                <input type="text" class="customer-add form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Số điện thoại:</label>
                            <div class="col-sm-8">
                                <input type="text" class="phone-number-add form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Địa chỉ:</label>
                            <div class="col-sm-8">
                                <textarea  class="address-add form-control"></textarea>
                            </div>
                        </div>
                    </div>
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
                
                <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Mã đơn:</label>
                            <div class="col-sm-8">
                                <span class="order-id-detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Ngày tạo:</label>
                            <div class="col-sm-8">
                                <span class="create-date-detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Khách hàng:</label>
                            <div class="col-sm-8">
                                <span class="customer-name-detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Số điện thoại:</label>
                            <div class="col-sm-8">
                                <span class="phone-number-detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Địa chỉ:</label>
                            <div class="col-sm-8">
                                <span class="address-detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label class="col-sm-4">Hóa đơn:</label>
                            <div class="col-sm-8">
                                <span class="total-detail"></span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-danger create-order" data-dismiss="modal">Đóng</a>
            </div>
        </div>
    </div>

  </div>
</div>
    
<!-- show print invoices -->
<div class="modal fade" id="popupInvoice" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" style="max-height: 700px; overflow-y: scroll;">
        <div class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">In hóa đơn</h4>
            </div>
            <div class="modal-body" id="outprint" style="width: 100%">
                <style>
                    .invoice-title h2, .invoice-title h3 {
                        display: inline-block;
                    }

                    .table > tbody > tr > .no-line {
                        border-top: none;
                    }

                    .table > thead > tr > .no-line {
                        border-bottom: none;
                    }

                    .table > tbody > tr > .thick-line {
                        border-top: 2px solid;
                    }
                </style>
                <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6" style="float: left; width: 350px">
                            <address>
                            <strong>Cửa hàng phụ kiện VT:</strong><br>
                                    Sđt: 0166.381.0003<br>
                                    Email: thevinh205@gmail.com<br>
                                    Website: trangphukien.com<br>
                                    Địa chỉ: A34 QL22, P.Trung Mỹ Tây, Q.12, HCM
                            </address>
                        </div>
                        <div class="col-xs-6" style="float: right; width: 350px">
                            <strong style="float: right">Mã đơn: 12345</strong><br>
                        </div>
                    </div>
                    </div>
                </div>

                    <div class="row" style="float: left">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Danh sách sản phẩm</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td style="width: 300px;"><strong>Sản phẩm</strong></td>
                                                <td style="width: 200px; text-align: center" class="text-center"><strong>Giá</strong></td>
                                                <td style="width: 150px; text-align: center" class="text-center"><strong>Số lượng</strong></td>
                                                <td style="width: 200px; text-align: right" class="text-right"><strong>Tổng</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td>BS-200</td>
                                                <td style="text-align: center">$10.99</td>
                                                <td style="text-align: center">1</td>
                                                <td style="text-align: right">$10.99</td>
                                            </tr>
                                            <tr>
                                                <td>BS-400</td>
                                                <td style="text-align: center">$20.00</td>
                                                <td style="text-align: center">3</td>
                                                <td style="text-align: right">$60.00</td>
                                            </tr>
                                            
                                            <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line" style="text-align: center"><strong>Tiền hàng</strong></td>
                                                    <td class="thick-line" style="text-align: right">$670.99</td>
                                            </tr>
                                            <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line" style="text-align: center"><strong>Tiền ship</strong></td>
                                                    <td class="no-line" style="text-align: right">$15</td>
                                            </tr>
                                            <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line" style="text-align: center"><strong>Tổng cộng</strong></td>
                                                    <td class="no-line" style="text-align: right">$685.99</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-danger" data-dismiss="modal">Đóng</a>
                <a href="javascript:void(0)" class="btn btn-success" onclick="printInvoiceAction()">In hóa đơn</a>
            </div>
        </div>
    </div>

  </div>
</div>
<script src="../static/js/shop-order-list.js"></script>