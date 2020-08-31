<?php 
    include("../config.php");
?>
<div>
    <div class="content-list">
        <h2 class="pull-left">Danh sách nhân viên</h2> 
        <button type="button" class="btn btn-info pull-right button-add" data-toggle="modal" 
                data-target="#addEmployee" title="Thêm mới nhân viên">    
            <i class="glyphicon glyphicon-plus"></i>
        </button>
        <table class="table table-bordered">
          <thead>
            <tr>
                <th>Stt</th>
                <th>Tên nhân viên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>CMND</th>
                <th>Địa chỉ</th>
                <th style="text-align: center"></th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $shopId = $_POST['shopId'];
                $sql="SELECT m.id, m.name, m.email, m.phone_number, m.address, m.identity_card FROM shop_party_relationship sp LEFT JOIN member m on m.id=sp.member_id where sp.shop_id='$shopId' and sp.type='employee'";
	        $result=mysqli_query($con,$sql);
                $index = 1;
	        while($tv_2=mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo    "<td>$index</td>";
                    echo    "<td class='employeeName'>$tv_2[name]</td>";
                    echo    "<td>$tv_2[email]</td>";
                    echo    "<td>$tv_2[phone_number]</td>";
                    echo    "<td>$tv_2[identity_card]</td>";
                    echo    "<td>$tv_2[address]</td>";
                    echo    "<td style='width: 110px; text-align: center'>";
                    echo        "<input type='hidden' value='$tv_2[id]' class='employeeId'/>";
                    echo        "<a href='javascript:void(0)' style='margin-right: 10px' title='Chỉnh sửa'>";
                    echo            "<i class='glyphicon glyphicon-edit'></i>";
                    echo        "</a>";
                    echo        "<a href='javascript:void(0)' class='linkDeleteEmployee'>";
                    echo            "<i class='glyphicon glyphicon-remove' title='Xóa' data-toggle='modal' data-target='#deleteEmployee'></i>";
                    echo        "</a>";
                    echo    "</td>";
                    echo "</tr>";
                    $index++;
                }
             ?>
          </tbody>
        </table>
    </div>
</div>

<!-- Delete employee -->
<div class="modal fade" id="deleteEmployee" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bạn có muốn xóa nhân viên <span style="font-weight: bold" id="employeeNameDelete"></span></h4>
            </div>
            <div class="modal-footer">
                <form action="#" th:action="@{delete}" method="post">
                    <input type="hidden" value="" name="employeeIdDelete" id="productIdDelete"/>
                    <button type="button" class="btn " data-dismiss="modal">Hủy bỏ</button>
                    <a href="javascript:void(0)" class="btn btn-danger deleteEmployeeAction">Xóa</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add new employee -->
<div class="modal fade" id="addEmployee" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" style="max-height: 700px; overflow-y: scroll;">
        <div class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Thêm nhân viên mới shop</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Tên nhân viên</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="employeeName"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Tên đăng nhập</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="username"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Password</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="password"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Email</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="email"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">SĐT</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="phoneNumber"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Địa chỉ</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="address"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Ngày sinh</label>
                    <div class="col-sm-8"> 
                        <input type="date" name="birthDate" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">CMND</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="identityCard"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Vai trò</label>
                    <div class="col-sm-8"> 
                        <select class="form-control" name="role">
                            <option value="sale">Bán hàng</option>
                            <option value="manager">Quản lý</option>
                            <option value="guard">Bảo vệ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label col-sm-4">Giới tính</label>
                    <div class="col-sm-8"> 
                        <select class="form-control" name="gender">
                            <option value="Name">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn btn-success add-employee-to-shop">Thêm</a>
            </div>
        </div>
        <div class="list-product-add">
        </div>
    </div>

  </div>
</div>
    
<script src="../static/js/shop-employee-list.js"></script>
<script src="../static/js/common.js"></script>
<?php 
	$con->close();
?>