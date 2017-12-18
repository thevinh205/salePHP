<?php 
    include("../config.php");
?>
<div>
    <div class="form-search">
        <span class="title-header">Tìm kiếm đơn hàng</span>
        <input type="hidden" name="shopId" th:value="${shop.id}"/>
        <div class="form-group row" style="margin-top: 10px;">
            <label class="col-sm-2">Mã đơn hàng:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="orderId" value="<?php echo $_POST['orderId']; ?>"/>
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
          <tbody>
            <tr th:each="order, stat : ${orderList}">
                <td th:text="${stat.index} + 1" class="text-center"></td>
                <td th:text="${order.orderId}" class="orderId"></td>
                <td th:text="${#dates.format(order.createDate, 'dd-MM-yyyy HH:mm')}"></td>
                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#popupOrderProductList" onclick="showListProductOfOrder(this)">Sản phẩm</a></td>
                <td th:text="${order.employeeName}" class="employee"></td>
                <td>
                    <span th:text="${#numbers.formatInteger(order.total,3,'COMMA')}" class="order-total-text"></span>
                    <input th:value="${#numbers.formatInteger(order.total,3,'COMMA')}" class="form-control order-total-input numbers hide" style="text-align: center"/>
                </td>
                <td>
                    <input type="hidden" th:value="${order.status}" class="order-status-text"/>
                    <select class="form-control status-order" name="statusList" disabled="disabled">
                        <option th:each="choice : ${statusList}" 
                         th:value="${choice.key}" 
                         th:selected="(${choice.key} == ${order.status})" 
                         th:text="${choice.name}"></option>
                    </select>
                </td>
                <td style="width: 110px; text-align: center">
                    <div class="btn-edit-order hide">
                        <a href="javascript:void(0)" style="margin-right: 10px" title="Chỉnh sửa" onclick="editOrderAction(this)">
                            <i class="glyphicon glyphicon-ok-sign"></i>
                        </a>
                        <a href="javascript:void(0)" class="linkDeleteProduct" onclick="cancelEditOrder(this)">
                            <i class="	glyphicon glyphicon-remove-sign" title="Hủy bỏ"></i>
                        </a>
                    </div>
                    <div class="btn-show-edit-order">
                        <a href="javascript:void(0)" style="margin-right: 10px" title="Chỉnh sửa" onclick="showEditOrder(this)">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
          </tbody>
        </table>
        <div style="font-weight: bold">
            <span>Tổng cộng:</span>
            <span class="price-total"><?php echo $_POST['totalPriceOrder']; ?></span> VNĐ
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