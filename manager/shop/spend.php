<?php 
    include("../config.php");
    session_start();
?>
<div>
    <div class="form-search">
        <span class="title-header">Tìm kiếm chi tiêu</span>
        <input type="hidden" name="shopId" th:value="${shop.id}"/>
        <div class="form-group row" style="margin-top: 10px;">
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
            <a href="javascript:void(0)" class="btn btn-info btnSearchSpend">
                <span class="glyphicon glyphicon-search"></span> Tìm kiếm
            </a>
        </div>
    </div>
    <div class="content-list">
        <h2 class="pull-left">Danh sách chi tiêu</h2> 
        <button type="button" class="btn btn-info pull-right button-add" data-toggle="modal" 
                data-target="#spendPopup" title="Tạo chi tiêu">    
            <i class="glyphicon glyphicon-plus"></i>
        </button>
        <table class="table table-bordered">
          <thead>
            <tr>
                <th style="width: 50px; text-align: center">Stt</th>
                <th>Nội dung</th>
                <th>Nhân viên</th>
                <th>Hóa đơn</th>
                 <th>Ngày</th>
                <th class="text-center">Hành động</th>
            </tr>
          </thead>
          <tbody
            <?php
                $shopId = $_POST['shopId'];
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                if($fromDate == '')
                    $fromDate = 0;
                $page = $_POST['page'] - 1;
                
      		$offset = $page * 30;
                $sql = "SELECT sp.id, sp.content, sp.create_date, sp.total, m.name, sp.employee FROM spend sp LEFT JOIN member m on sp.employee=m.username WHERE sp.shop_id=$shopId and sp.create_date>'$fromDate'";
                if($toDate != ''){
                    $toDate = date('Y-m-d',strtotime($toDate . "+1 days"));
                    $sql = $sql." and sp.create_date<'$toDate'";
                } else {
                    $sql = $sql." and sp.create_date<NOW()"; 
                }
                $sql = $sql." LIMIT $offset,30";
                
	        $result=mysqli_query($con,$sql);
	        $index = $offset + 1;
                $totalSpend = 0;
                while($tv_2=mysqli_fetch_array($result)){
                    $totalSpend += $tv_2['total'];
                    echo "<tr>";
                    echo    "<td class='text-center'>$index</td>";
                    echo    "<td>";
                    echo        "<span class='spend-id hide'>$tv_2[id]</span>";
                    echo        "<span class='content-text'>$tv_2[content]</span>";
                    echo        "<textarea value='$tv_2[content]' class='form-control content-input hide'>$tv_2[content]</textarea>";
                    echo    "</td>";
                    echo    "<td>$tv_2[name]</td>";
                    echo    "<td>";
                    echo        "<span class='total-text numbers'>$tv_2[total]</span>";
                    echo        "<input value='$tv_2[total]' class='form-control total-input hide numbers'/>";
                    echo    "</td>";
                    echo    "<td>$tv_2[create_date]</td>";
                    echo    "<td style='width: 110px; text-align: center'>";
                    if($_SESSION["role"] == 'manager' || $tv_2['employee'] == $_SESSION["username"]) {
                        echo        "<div class='btn-edit-spend hide'>";
                        echo            "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='editSpendAction(this)'>";
                        echo                "<i class='glyphicon glyphicon-ok-sign'></i>";
                        echo            "</a>";
                        echo            "<a href='javascript:void(0)' class='linkDeleteProduct' onclick='cancelEditSpend(this)'>";
                        echo                "<i class='glyphicon glyphicon-remove-sign' title='Hủy bỏ'></i>";
                        echo            "</a>";
                        echo        "</div>";
                        echo        "<div class='btn-show-edit-spend'>";
                        echo            "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='showEditSpend(this)'>";
                        echo                "<i class='glyphicon glyphicon-edit'></i>";
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
            <span class="price-total-order numbers"><?php echo $totalSpend; ?></span> VNĐ
        </div>
        
        <div class="pagination">
            <?php
                $sql = "SELECT count(*) as total FROM spend sp LEFT JOIN member m on sp.employee=m.username WHERE sp.shop_id=$shopId and sp.create_date>'$fromDate'";
                if($toDate != ''){
                    $toDate = date('Y-m-d',strtotime($toDate . "+1 days"));
                    $sql = $sql." and sp.create_date<'$toDate'";
                } else {
                    $sql = $sql." and sp.create_date<NOW()"; 
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
                        echo "<a href='javascript:void(0)' class='page gradient' onclick='searchSpend($i)'>$i</a>";
                }
            ?>
        </div>
        
    </div>
</div>

<!-- Add new spend -->
<div class="modal fade" id="spendPopup" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
            <form class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thêm chi tiêu mới</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Hóa đơn (VNĐ):</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control numbers" name="totalAdd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Nội dung:</label>
                        <div class="col-sm-8"> 
                            <textarea class="form-control" rows="5" name="contentAdd"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="createSpendAction()">Tạo</a>
                </div>
            </form>
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
    
<script src="../static/js/spend.js"></script>
<?php 
	$con->close();
?>