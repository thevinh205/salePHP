<!DOCTYPE HTML>
<html>
	<?php 
	    include("../config.php");
	?> 
    <h2 class="pull-left">Danh sách đen</h2> 
    <button type="button" class="btn btn-info pull-right button-add" data-toggle="modal" 
            data-target="#addBlackList" title="Thêm mới sản phẩm">    
        <i class="glyphicon glyphicon-plus"></i>
    </button>
    
    <table class="table table-bordered">
      <thead>
        <tr>
            <th>Stt</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Link facebook</th>
            <th>Nội dung</th>
            <th style="text-align: center">Hành động</th>
        </tr>
      </thead>
      <tbody>
      	<?php
      		$nameSearch = $_POST['nameSearch'];
      		$phoneSearch = $_POST['phoneSearch'];
      		$page = $_POST['page'] - 1;
      		$offset = $page * 30;
	    	$sql="SELECT id, name, phone_number, address, link, content FROM black_list WHERE name LIKE '%$nameSearch%' and phone_number LIKE '%$phoneSearch%' LIMIT $offset,30";
	        $result=mysqli_query($con,$sql);
	        $index = $page*30 + 1;
	        while($tv_2=mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo    "<td >$index</td>";
                    echo    "<td>";
                    echo    	"<span class='name'>$tv_2[name]</span>";
					echo    	"<input type='hidden' class='id' value='$tv_2[id]'></input>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='phone-number'>$tv_2[phone_number]</span>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='address'>$tv_2[address]</span>";
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='link'>$tv_2[link]</span>"	;
                    echo    "</td>";
                    echo    "<td>";
                    echo    	"<span class='content'>$tv_2[content]</span>";	
                    echo    "</td>";
                    echo    "<td style='width: 110px; text-align: center'>";
                    echo        "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa' onclick='showEditBlackList(this)'>";
                    echo            "<i class='glyphicon glyphicon-edit' data-toggle='modal' data-target='#editBlackList'></i>";
                    echo        "</a>";
                    echo        "<a href='javascript:void(0)' onclick='showDeleteBlackList(this)'>";
                    echo            "<i class='glyphicon glyphicon-remove' title='Xóa' data-toggle='modal' data-target='#deleteBlackList'></i>";
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
    		$sql="SELECT count(*) as total FROM black_list where name LIKE '%$nameSearch%' and phone_number LIKE '%$phoneSearch%'";
	        $result=mysqli_query($con,$sql);
	        $data=mysqli_fetch_assoc($result);
	        $totalPage = $data['total']/30;
	        if($data['total']%30 > 0)
	        	$totalPage +=1;
	       	for($i=1; $i<=$totalPage; $i++) {
		       	if(($i-1) == $page)
		        	echo "<a href='javascript:void(0)' class='page active'>$i</a>";
		       	else
		       		echo "<a href='javascript:void(0)' class='page gradient' onclick='loadBlackList($i)'>$i</a>";
	        }
        	$con->close();
        ?>
    </div>
</html>