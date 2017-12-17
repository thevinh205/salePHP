<?php 
    include("config.php");
?>
<html>
    <body>
    	<script src="static/js/jquery.min.js"></script>
        <script src="static/js/common.js"></script>
    	<script src="static/js/product.js"></script>
    	 
      	<?php 
		    include("layout/header.html");
		?>  
		
		<div class="container">
	        <div class="row">
	            <?php 
				    include("layout/left-menu.html");
				?>  
	            
	            <div class="body">
	                <div class="header">
	                    <span>Danh sách sản phẩm</span>
	                </div>
	                
	                <div class="content">
	                    <div class="form-search">
	                        <span class="title-header">Tìm kiếm sản phẩm</span>
	                        <form >
	                            <div class="form-group">
	                                <label class="form-control-label">Mã sản phẩm</label>
	                                <input type="text" class="form-control form-control-warning" name="productId"/>
	                            </div>
	                            <div class="form-group">
	                                <label class="form-control-label">Tên sản phẩm</label>
	                                <input type="text" class="form-control form-control-success" name="productName"/>
	                            </div>
	                            <div class="form-group">
	                                <a href="javascript:void(0)" class="btn btn-info" onclick="loadProductTable(1)">
	                                    <span class="glyphicon glyphicon-search"></span> Tìm kiếm
	                                </a>
	                            </div>
	                        </form>
	                    </div>
	                    <div class="content-list">
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    
	    <!-- Delete product -->
    <div class="modal fade" id="deleteProduct" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Bạn có muốn xóa sản phẩm <span style="font-weight: bold" id="productNameDelete"></span></h4>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" name="productIdDelete" id="productIdDelete"/>
                    <button type="button" class="btn " data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-danger" href="javascript:void(0)" onclick="deleteProduct()">Xóa</a>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Add new product -->
    <div class="modal fade" id="addProduct" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="form-horizontal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Thêm mới sản phẩm</h4>
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
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Loại sản phẩm</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="productTypeAdd" id="productTypeAdd">
                                <?php
									$sql="SELECT type_id, type_name FROM product_type";
									$result=mysqli_query($con,$sql);
									while($tv_3=mysqli_fetch_array($result)){
										echo "<option value='$tv_3[type_id]'>$tv_3[type_name]</option>";
									}
								?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Giá nhập</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control numbers" name="priceBuyAdd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Giá bán</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control numbers" name="priceSellAdd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Mô tả</label>
                        <div class="col-sm-8"> 
                            <textarea class="form-control" rows="5" name="descriptionAdd"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label col-sm-4">Hình ảnh</label>
                        <div class="col-sm-8"> 
                            <a class="btn btn-success" title="Add files" style="margin-left: 20px">
                                <label for="files" class="btn">Chọn</label>
                            </a>
                            <input id="files" accept="image/*" onchange="loadFile(event)" multiple="multiple" style="visibility:hidden;" type="file"/>
                            <div class="list-file-preview">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <a href="javascript:void(0)" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="addProduct()">Tạo</a>
                </div>
            </form>
        </div>

      </div>
    </div>
    
    <!-- start edit product -->
    <div class="modal fade" id="editProduct" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content product-modal-edit">
            
        </div>

      </div>
    </div>
    <!-- end edit product -->
    </body>
</html>
