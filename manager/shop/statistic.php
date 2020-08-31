<?php 
    include("../config.php");
?>
<div>
    <div class="form-search">
        <span class="title-header">Tìm kiếm thống kê</span>
        <input type="hidden" name="shopId" value="<?php echo $_POST['shopId']; ?>"/>
        <div class="form-group row" style="margin-top: 10px ">
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
        <?php 
        //doanh thu
            $total = 0;
            $danhan = 0;
            $danggiao = 0;
            $shopId = $_POST['shopId'];
            $fromDate = $_POST['fromDate'];
            $toDate = $_POST['toDate'];
            if($fromDate == '')
                $fromDate = 0;
            $sql = "";
            if($toDate != ''){
                $toDate = date('Y-m-d',strtotime($toDate . "+1 days"));
                $sql="SELECT total_price, shipment_fee, status FROM order_header where shop_id= $shopId and create_date>='$fromDate' and create_date<'$toDate' and status != 'cancle'";
            } else {
                $sql="SELECT total_price, shipment_fee, status FROM order_header where shop_id= $shopId and create_date>='$fromDate' and create_date<NOW() and status != 'cancle'";
            }
            $result=mysqli_query($con,$sql);
            while($tv_3=mysqli_fetch_array($result)){
                $total += ($tv_3['total_price'] + $tv_3['shipment_fee']);
                if($tv_3['status'] == 'resolve')
                    $danhan += ($tv_3['total_price'] + $tv_3['shipment_fee']);
            }
            $danggiao = $total - $danhan;
        //lợi nhuận
//            $sql = "";
//            if($toDate != ''){
//                $sql="SELECT sum(price_buy*count) as cost FROM order_header od LEFT JOIN order_party_relationship op ON od.id=op.order_id LEFT JOIN product p on op.product_id=p.id where od.shop_id= $shopId and op.create_date>='$fromDate' and op.create_date<'$toDate' and od.status = 'resolve'";
//            } else {
//                $sql="SELECT sum(price_buy*count) as cost FROM order_header od LEFT JOIN order_party_relationship op ON od.id=op.order_id LEFT JOIN product p on op.product_id=p.id where od.shop_id= $shopId and op.create_date>='$fromDate' and op.create_date<NOW() and od.status = 'resolve'";
//            }
//            $result=mysqli_query($con,$sql);
//            $data = mysqli_fetch_assoc($result);
//            $profit = $danhan - $data['cost'];
            
        //chi phí
            $sql = "SELECT sum(total) as cost FROM spend sp where sp.shop_id=$shopId and sp.create_date>='$fromDate' ";
            if($toDate != ''){
                $sql = $sql." and sp.create_date<'$toDate'";
            } else {
                $sql = $sql." and sp.create_date<NOW()";
            }
            $result=mysqli_query($con,$sql);
            $data = mysqli_fetch_assoc($result);
            $spend = $data['cost'];
            if($spend == '')
                $spend = 0;
            $totalCast = $danhan - $spend;
        ?>
        
        <table class="table table-bordered">
          <thead>
            <tr>
                <th style="text-align: center">Doanh thu</th>
                <th style="text-align: center">Tiền đã nhận</th>
                <th style="text-align: center">Hàng đang giao</th>
                <th style="text-align: center">Chi tiêu</th>
<!--                <th style="text-align: center">Tổng lợi nhuận</th>-->
                <th style="text-align: center">Tổng tiền mặt</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td style='font-weight: bold; font-size: 18px; text-align: center'><?php echo "<span class='price-total numbers'>$total</span> VNĐ"; ?></td>
                  <td style='font-weight: bold; font-size: 18px; text-align: center'><?php echo "<span class='price-total numbers'>$danhan</span> VNĐ"; ?></td>
                  <td style='font-weight: bold; font-size: 18px; text-align: center'><?php echo "<span class='price-total numbers'>$danggiao</span> VNĐ"; ?></td>
                  <td style='font-weight: bold; font-size: 18px; text-align: center'><?php echo "<span class='price-total numbers'>$spend</span> VNĐ"; ?></td>
<!--                  <td style='font-weight: bold; font-size: 18px; text-align: center'><?php echo "<span class='price-total numbers'>$profit</span> VNĐ"; ?></td>-->
                  <td style='font-weight: bold; font-size: 18px; text-align: center'><?php echo "<span class='price-total numbers'>$totalCast</span> VNĐ"; ?></td>
              </tr>
          </tbody>
        </table>
    </div>
</div>
<?php 
	$con->close();
?>