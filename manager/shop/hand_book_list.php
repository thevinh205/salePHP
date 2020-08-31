<?php 
    include("../config.php");
    session_start();
?>
<div>
    <div class="content-list">
        <h2 class="pull-left">Danh sách cẩm nang</h2> 
        <?php
            if($_SESSION["role"] == 'manager') {
                echo "<a class='btn btn-info pull-right button-add' title='Thêm mới sản cẩm nang' href='hand_book_detail.php?shopId=$_POST[shopId]'>";
                echo    "<i class='glyphicon glyphicon-plus'></i>";
                echo "</a>";
            }
        ?>
        <table class="table table-bordered">
          <thead>
            <tr>
                <th style="width: 50px; text-align: center">Stt</th>
                <th>Hình ảnh</th>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ngày tạo</th>
                <th class="text-center">Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php
      		$productId = $_POST['productId'];
      		$productName = $_POST['productName'];
            $shopId = $_POST['shopId'];
      		$page = $_POST['page'] - 1;
      		$offset = $page * 30;
	    	$sql="SELECT id, avatar, title, create_date FROM  hand_book where shop_id='$shopId' ";
                $sql = $sql." LIMIT $offset,30";
	        $result=mysqli_query($con,$sql);
	        $index = $page*30 + 1;
	        while($tv_2=mysqli_fetch_array($result)){
                    echo "<tr id='$tv_2[id]'>";
                    echo    "<td >$index</td>";
                    echo    "<td>";
                    echo        "<img src='../../resources/img/camnang/$tv_2[id]/$tv_2[avatar]' width='100' height='100'/>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='productId'>$tv_2[id]</span>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='productName'>$tv_2[title]</span>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='productType'>$tv_2[create_date]</span>";
                    echo    "</td>";
                    echo    "<td style='width: 110px; text-align: center'>";
                    if($_SESSION["role"] == 'manager') {
                        echo            "<a href='hand_book_detail.php?id=$tv_2[id]&shopId=$_POST[shopId]' style='margin-right: 10px' title='Chỉnh sửa'>";
                        echo                "<i class='glyphicon glyphicon-edit'></i>";
                        echo            "</a>";
                        echo            "<a href='javascript:void(0)' class='linkDeleteProduct' onclick='showFormDeleteHandbook($tv_2[id])'>";
                        echo                "<i class='glyphicon glyphicon-remove' title='Xóa' data-toggle='modal' data-target='#deleteHandbook'></i>";
                        echo            "</a>";
                        echo    "</td>";
                    }
                    echo "</tr>";
                    $index++;
          	}
            ?>
          </tbody>
        </table>
        <div class="pagination">
            <?php
                $sql="SELECT count(*) as total FROM  hand_book where shop_id='$shopId'";
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
				$con->close();
            ?>
        </div>
    </div>
</div>
   
  <!-- Delete handbook -->
    <div class="modal fade" id="deleteHandbook" role="dialog">
    	<input type="hidden" value="" id="handBookDeleteId"/>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Bạn có muốn xóa cẩm nang này <span style="font-weight: bold" id="handbookNameDelete"></span></h4>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" name="productIdDelete" id="productIdDelete"/>
                    <button type="button" class="btn " data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="deleteHandBook()">Xóa</a>
                </div>
            </div>
        </div>
    </div>
<script src="../static/js/common.js"></script>