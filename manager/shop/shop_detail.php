<?php 
    include("config.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Chi tiết cửa hàng</title>
	<script src="static/js/jquery.min.js"></script>
    <div th:replace="layout/header :: header-css"/>
    <script src="../static/js/shop.js"></script>
    <link rel="stylesheet" href="../static/css/shop.css" />
    <link rel="stylesheet" href="../static/css/main.css" />
    <link rel="stylesheet" type="text/css" 
                  href="../static/bootstrap-3.3.7/dist/css/bootstrap.min.css" />
    <script src="../static/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>
<body>

    <?php 
	    include("../layout/header.html");
	?>

    <div class="container">
        <div class="row">
            <?php 
			    include("../layout/left-menu.html");
			?>
            <input type="hidden" th:value="${shop.id}" id="shopId"/>
            <div class="body">
                <div class="header">
                    <span>Chi tiết <span th:text="${shop.name}"></span></span>
                </div>
                
                <div class="content">
                    <div>
			  <ul class="nav nav-tabs">
			    <li class="active"><a href="javascript:void(0)" onclick="changeTab('productList')"><strong>Sản phẩm</strong></a></li>
			    <li><a href="javascript:void(0)" onclick="changeTab('employeeList')"><strong>Nhân viên</strong></a></li>
			    <li><a href="javascript:void(0)" onclick="changeTab('orderList')"><strong>Đơn hàng</strong></a></li>
			    <li><a href="javascript:void(0)" onclick="changeTab('statistic')"><strong>Thống kê</strong></a></li>
			  </ul>
			
			  <div class="tab-content">
			    <div id="contentTab" class="tab-pane fade in active" style="width: 100%">
			    </div>
			  </div>
			</div>

			<script>
				$(document).ready(function(){
				    $(".nav-tabs a").click(function(){
				        $(this).tab('show');
				    });
				});
			</script>
                </div>
            </div>
        </div>

    </div>

        <!-- Delete product -->
    

    <!--<div th:replace="layout/footer :: footer"/>-->
    </body>
</html>