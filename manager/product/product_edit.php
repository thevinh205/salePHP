﻿<html>
	<?php 
	    include("../config.php");
		$productId = $_GET['productIdEdit'];
		$sql1="SELECT id, name, price_sell, price_buy, avatar, product_type, description, avatar FROM product WHERE id='".$productId."'";
	    $result1=mysqli_query($con,$sql1);
		$row1 = mysqli_fetch_assoc($result1);
	?> 
    <form class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chỉnh sửa sản phẩm</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="form-control-label col-sm-4">Mã sản phẩm</label>
                <div class="col-sm-8"> 
                    <span name="productIdEdit"><?php echo $row1['id']; ?></span>
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label col-sm-4">Tên sản phẩm</label>
                <div class="col-sm-8"> 
                    <input type="text" class="form-control" name="productNameEdit" value="<?php echo $row1['name']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label col-sm-4">Loại sản phẩm</label>
                <div class="col-sm-8"> 
                    <select class="form-control" name="productTypeEdit" id="productTypeEdit">
                        <?php
                                $sql2="SELECT type_id, type_name FROM product_type";
                                $result2=mysqli_query($con,$sql2);
                                while($tv_3=mysqli_fetch_array($result2)){
                                        if($tv_3['type_id'] == $row1['product_type']){
                                                 echo "<option selected='selected' value='$tv_3[type_id]'>$tv_3[type_name]</option>";
                                        }
                                        else{
                                                 echo "<option value='$tv_3[type_id]'>$tv_3[type_name]</option>";
                                        }
                                }
                        ?>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label col-sm-4">Giá nhập</label>
                <div class="col-sm-8"> 
                    <input type="text" class="form-control numbers" name="priceBuyEdit" value="<?php echo $row1['price_buy']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label col-sm-4">Giá bán</label>
                <div class="col-sm-8"> 
                    <input type="text" class="form-control numbers" name="priceSellEdit" value="<?php echo $row1['price_sell']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label col-sm-4">Mô tả</label>
                <div class="col-sm-8"> 
                    <textarea class="form-control" rows="5" name="descriptionEdit" value="<?php echo $row1['description']; ?>"><?php echo $row1['description']; ?></textarea>
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
                        <div class="img-wrap" th:each="fileName, stat1 : ${listFileName}">
                            <span class="close" onclick="deleteImage(this)">&times;</span>
                            <img src="../../resources/img/sanpham/<?php echo $row1['id'] . '/' . $row1['avatar'];?>" 
                                 class="image-preview"/>
                            <input type="hidden" class="img-name-delete" th:value="${fileName}"></input>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">

            <a href="javascript:void(0)" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</a>
            <a href="javascript:void(0)" class="btn btn-success" onclick="editProductAction()">Chỉnh sửa</a>
        </div>
         <input type="hidden" th:value="${listFileName.size()}" id="imageTotal"></input>
         <input type="hidden" th:value="${listFileName}" id="listFileNameImg"></input>
         <input type="hidden" th:value="${maxFileName}" id="maxFileName"></input>
         <input type="hidden" value="<?php echo $row1['avatar'];?>" id="avatar"></input>
    </form>
</html>