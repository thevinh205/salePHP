<?php 
    include("../config.php");
?>
<html>
    <body>
        <script src="../static/js/jquery.min.js"></script>
        <script src="../static/js/black-list.js"></script>
    	 
      	<?php 
		    include("../layout/header.html");
		?>  
		
		<div class="container">
	        <div class="row">
	            <?php 
				    include("../layout/left-menu.html");
				?>  
	            
	            <div class="body right">
	                <div class="header">
	                    <span>Danh sách đen</span>
	                </div>
	                
	                <div class="content">
	                    <div class="form-search">
	                        <span class="title-header">Tìm kiếm danh sách đen</span>
	                        <div class="form-group row" style="margin-top:20px">
	                            <div class="col-sm-6">
	                                <label class="col-sm-4">Tên</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="nameSearch"/>
									</div>
	                            </div>
	                            <div class="col-sm-6">
	                                <label class="col-sm-4">Số điện thoại</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="phoneSearch"/>
									</div>
	                            </div>
							</div>
	                        <div class="form-group">
	                            <a href="javascript:void(0)" class="btn btn-info" onclick="loadBlackList(1)">
	                                <span class="glyphicon glyphicon-search"></span> Tìm kiếm
	                            </a>
	                        </div>
	                        
	                    </div>
	                    <div class="content-list">
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
        
    <!-- Add new black list -->
    <div class="modal fade" id="addBlackList" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thêm mới Danh sách đen</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Tên</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="nameAdd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Số điện thoại</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="phoneNumberAdd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Đia chỉ</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="addressAdd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Link facebook</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="linkAdd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Nội dung</label>
                        <div class="col-sm-8"> 
                            <textarea class="form-control" rows="5" name="contentAdd"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <a href="javascript:void(0)" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="createBlackList()">Tạo</a>
                </div>
            </form>
        </div>

      </div>
    </div>
	<!-- End add new black list -->
	
	<!-- Start edit black list -->
    <div class="modal fade" id="editBlackList" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Chỉnh sửa Danh sách đen</h4>
				  <input type="hidden" name="idEdit" value=""/>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Tên</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="nameEdit"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Số điện thoại</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="phoneNumberEdit"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Đia chỉ</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="addressEdit"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Link facebook</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="linkEdit"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Nội dung</label>
                        <div class="col-sm-8"> 
                            <textarea class="form-control" rows="5" name="contentEdit"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <a href="javascript:void(0)" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="editBlackList()">Chỉnh sửa</a>
                </div>
            </form>
        </div>

      </div>
    </div>
	<!-- End edit black list -->
	
	<!-- Start Delete black list -->
    <div class="modal fade" id="deleteBlackList" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Bạn có muốn xóa danh sách đen <span style="font-weight: bold" id="blackListNameDelete"></span></h4>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" name="blackListIdDelete" value=""/>
                    <button type="button" class="btn " data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="deleteBlackList()">Xóa</a>
                </div>
            </div>
        </div>
    </div>
	<!-- End Delete black list -->
    </body>
</html>
