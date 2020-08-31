<?php 
    include("../config.php");
?>
<html>
    <body>
        <script src="../static/js/jquery.min.js"></script>
        <script src="../static/js/shop.js"></script>
    	 
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
	                	<?php 
	                		$handbookId = null;
							$title = "";
							$newId = null;
							$description = "";
							if( isset($_GET["id"]) && trim($_GET['id']) != '') {
								$handbookId = $_GET['id'];
							}
							if($handbookId == null) {
								echo "<span>Thêm mới cẩm nang</span>";
								$sql = "SELECT MAX(id) as id FROM hand_book";
            					$result=mysqli_query($con,$sql);
            					$data = mysqli_fetch_assoc($result);
								$newId = $data['id'] + 1;
							} else {
								echo "<span>Chỉnh sửa cẩm nang</span>";
								$sql = "SELECT title, description FROM hand_book where id=$handbookId";
            					$result=mysqli_query($con,$sql);
            					$data = mysqli_fetch_assoc($result);
            					$title = $data['title'];
            					$description = $data['description'];
								$newId = $handbookId;
							}
	                	?>
	                </div>
	                
	                <div class="content">
	                    <div class="form-search">
	                    	<input type="hidden"  value="<?php echo $_GET['shopId'] ?>" id="shopId"/>
	                    	<input type="hidden"  value="<?php echo $newId ?>" id="newId"/>
	                        <form >
	                            <div class="form-group">
	                                <label class="form-control-label">Tiêu đề</label>
	                                <input type="text" class="form-control form-control-warning" name="title" value="<?php echo $title ?>"/>
	                            </div>
	                            <div class="form-group">
	                                <label class="form-control-label">Nội dung</label>
	                               	<textarea rows="20" cols="100" class="form-control form-control-warning" name="description" ><?php echo $description ?></textarea>
	                            </div>
	                            <div class="form-group">
	                                <a href="javascript:void(0)" class="btn btn-info" >
	                                    <span class="glyphicon glyphicon-zoom-in"></span> Xem trước
	                                </a>
	                                <?php
	                                	if($handbookId == null) {
	                                		echo "<a href='javascript:void(0)' class='btn btn-info' onclick='createHandBook()'>
	                                    		<span class='glyphicon glyphicon-plus'></span> Tạo
	                                		</a>";
										} else {
											echo "<a href='javascript:void(0)' class='btn btn-info' onclick='updateHandBook()'>
	                                    		<span class='glyphicon glyphicon-pencil'></span> Chỉnh sửa
	                                		</a>";
										}
									?>
		                            <a href="javascript:void(0)" class="btn btn-info">
		                                <label for="files" class="glyphicon glyphicon-cloud-upload"> Hình</label>
		                            </a>
		                            <input id="files" accept="image/*" onchange="loadFile(event)" multiple="multiple" style="visibility:hidden;" type="file"/>
	                            </div>
	                        </form>
	                    </div>
	                    <div class="content-list">
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

    </body>
</html>
<?php 
	$con->close();
?>
