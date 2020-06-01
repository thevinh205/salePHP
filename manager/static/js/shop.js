var filesUpload = [];
var handbookDeleteId;
function changeTab(tabName){
    try{
        if(null != tabName){
            var shopId = $("#shopId").val();
            var url = "";
            if(tabName == 'productList')
                url = "product_list.php";
            if(tabName == 'orderList')
                url = "order_list.php";
            if(tabName == 'employeeList')
                url = "employee_list.php";
            if(tabName == 'statistic')
                url = "statistic.php";
            if(tabName == 'spend')
                url = "spend.php";
            if(tabName == 'handbook')
                url = "hand_book_list.php";
            $.ajax({	
                type: 'POST', 
                url: url, 
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    shopId: shopId, 
                    page: 1,
                    productId :'', 
                    productName: '',
                    productType: 'all',
                    productStatus: '',
                    orderId: '',
                    totalPriceOrder:0,
                    fromDate:'',
                    toDate: '',
                    customer: '',
                    phoneNumber: '',
                    status: ''
                },
                success: function(data){ 
                    $("div[id*='contentTab']").html(data);
                    $(".numbers").each(function(c, obj){
                        $(obj).text(addCommas(parseFloat($(obj).text())));
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                }
            }); 
        }
    }catch (e) {
            // TODO: handle exception
    }
}

$(document).ready(function(){
    var shopId = $("#shopId").val();
    var url = "order_list.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { 
            shopId: shopId, 
                    page: 1,
                    productId :'', 
                    orderId: '',
                    totalPriceOrder:0,
                    fromDate:'',
                    toDate: '',
                    customer: '',
                    phoneNumber: '',
                    status: ''
        },
        success: function(data){ 
            $("div[id*='contentTab']").html(data);
            $(".numbers").each(function(c, obj){
                $(obj).text(addCommas(parseFloat($(obj).text())));
            });
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
});

function statisticAction() {
    var shopId = $("#shopId").val();
    var fromDate = $(".fromDate").val();
    var toDate = $(".toDate").val();
    var url = "statistic.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            fromDate : fromDate, 
            toDate: toDate,
            shopId : shopId
        },
        success: function(data){ 
            $("div[id*='contentTab']").html(data);
			$(".numbers").each(function(c, obj){
				$(obj).text(addCommas(parseFloat($(obj).text())));
			});
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function loadFile(event) {
	var newId = $("#newId").val();
	var title = $("input[name*='title']").val();
    for(var i=0; i<event.target.files.length; i++) {
       var output = "<img style='width:80%' src='../resources/img/camnang/" + newId + "/" + event.target.files[i]['name'] +"' alt='" + title + "'/>";
       output = "<br/><div class='center-div' style='width:100%'>" + output + "</div><br/>";
       
       var $txt = $('textarea[name ="description"]')
       var caretPos = $txt[0].selectionStart;
       var textAreaTxt = $txt.val();
       $txt.val(textAreaTxt.substring(0, caretPos) + output + textAreaTxt.substring(caretPos) );
       
       filesUpload.push(event.target.files[i]);
    }
    
    
 };
 
 function uploadImage(handBookId) {
	    var countFile = filesUpload.length;
	    var url = "../upload.php";
	    for(var i=0; i<countFile; i++){
	        try{
	            var fileName = filesUpload[i].name;

	            var data = new FormData();
	            data.append("file", filesUpload[i]);
	            data.append("handBookId", handBookId);
	            data.append("fileName", fileName);
	            data.append("type", "handBook");
	            
	            $.ajax({
	                url: url,
	                type: "POST",
	                data: data,
	                dataType: 'script',
	                cache: false,
	                processData: false,
	                contentType: false,
	                async: false,
	                success: function (e) {
	                },
	                error: function (e) {
	                },
	                complete: function (res) {
	                }
	            });
	        }catch (e) {
	                // TODO: handle exception
	        }
	    }
	 }
 
 function createHandBook() {
	var shopId = $("#shopId").val();
	var newId = $("#newId").val();
    var title = $("input[name*='title']").val();
    var description = $("textarea[name*='description']").val();
    var avatar = null;
    if(filesUpload.length > 0) {
    	avatar = filesUpload[0]['name'];
    }
    
    uploadImage(newId);
    
    var url = "shop.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            shopId : shopId, 
            title: title,
            newId: newId,
            avatar: avatar,
            description: description,
            type : 'createHandBook'
        },
        success: function(data){ 
        	filesUpload = [];
            $('#spendPopup').modal('toggle');
            showNotificationHeader("Tạo cẩm nang thành công");
            window.location.href = "shop_detail.php?shopId=" + shopId;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
 }
 
 function updateHandBook() {
	 	var shopId = $("#shopId").val();
		var newId = $("#newId").val();
	    var title = $("input[name*='title']").val();
	    var description = $("textarea[name*='description']").val();
	    
	    uploadImage(newId);
	    
	    var url = "shop.php";
	    $.ajax({	
	        type: 'POST', 
	        url: url, 
	        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
	        data: {
	            title: title,
	            newId: newId,
	            handBookId: newId,
	            description: description,
	            type : 'updateHandBook'
	        },
	        success: function(data){ 
	        	filesUpload = [];
	            showNotificationHeader("Chỉnh sửa cẩm nang thành công");
	            window.location.href = "shop_detail.php?shopId=" + shopId;
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown){
	        }
	    }); 
	 }
 
 function showFormDeleteHandbook(handbookId) {
	 handbookDeleteId = handbookId;
 }
 
 function deleteHandBook() {
	 var url = "shop.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            id: handbookDeleteId,
            type : 'deleteHandBook'
        },
        success: function(data){ 
        	$("tr[id*=" + handbookDeleteId + "]").remove();
            $('#deleteHandbook').modal('toggle');
            showNotificationHeader("Xóa cẩm nang thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
 }