<?php 
    include("../config.php");
?>
<div>
    <div class="form-search">
        <span class="title-header">Thống kê</span>
        <input type="hidden" name="shopId" value="<?php echo $_POST['shopId']; ?>"/>
        <div class="form-group row">
            <div class="col-sm-6">
                <label class="col-sm-4">Từ ngày:</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control fromDate" value="<?php echo $_POST['fromDate'];?>"/>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="col-sm-4">Đến ngày:</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control toDate" value="<?php echo $_POST['toDate'];?>"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <a href="javascript:void(0)" class="btn btn-info btnStatistic" onclick="statisticAction()">
                <span class="glyphicon glyphicon-search"></span> Tìm kiếm
            </a>
        </div>
    </div>
    <div class="content-list">
        <h2>Thống kê</h2> 
        <div style="font-weight: bold; font-size: 18px">
            <span>Doanh thu:</span>
            <?php 
                $shopId = $_POST['shopId'];
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];
                if($fromDate == '')
                    $fromDate = 0;
                $sql = "";
                if($toDate != ''){
                    $toDate = date('Y-m-d',strtotime($toDate . "+1 days"));
                    $sql="SELECT sum(total_price) as total FROM order_header where shop_id= $shopId and create_date>='$fromDate' and create_date<'$toDate' and status != 'cancle'";
                } else {
                    $sql="SELECT sum(total_price) as total FROM order_header where shop_id= $shopId and create_date>='$fromDate' and create_date<NOW() and status != 'cancle'";
                }
                $result=mysqli_query($con,$sql);
                $data = mysqli_fetch_assoc($result);
                $total = $data['total'];
                echo "<span class='price-total numbers'>$total</span> VNĐ";
            ?>
            
        </div>
        <div style="font-weight: bold; font-size: 18px">
            <span>Lợi nhuận:</span>
            <?php 
                $sql = "";
                if($toDate != ''){
                    $sql="SELECT sum(price_buy*count) as cost FROM order_header od LEFT JOIN order_party_relationship op ON od.id=op.order_id LEFT JOIN product p on op.product_id=p.id where od.shop_id= $shopId and op.create_date>='$fromDate' and op.create_date<'$toDate' and od.status != 'cancle'";
                } else {
                    $sql="SELECT sum(price_buy*count) as cost FROM order_header od LEFT JOIN order_party_relationship op ON od.id=op.order_id LEFT JOIN product p on op.product_id=p.id where od.shop_id= $shopId and op.create_date>='$fromDate' and op.create_date<NOW() and od.status != 'cancle'";
                }
                $result=mysqli_query($con,$sql);
                $data = mysqli_fetch_assoc($result);
                $profit = $total - $data['cost'];
                echo "<span class='price-total numbers'>$profit</span> VNĐ";
            ?>
        </div>
        
        <table class="table table-bordered">
          <thead>
            <tr>
                <th>Vốn ban đầu</th>
                <th>Doanh thu</th>
                <th>Chi phí</th>
                <th>Số tiền hiện tại</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
          </tbody>
        </table>
    </div>
</div>