var filesUpload = [];
var countImage = 0; //so luong image ban dau
var filesDelete = [];

$(document).ready(function(){   
//    $(".linkDeleteProduct").click( function(){
//        var row = $(this).closest("tr");
//        var productName = $(row).find(".productName").text();
//        var productId = $(row).find(".productId").text();
//        
//        $("#productNameDelete").text(productName);
//        $("#productIdDelete").val(productId);
//    });
    
    loadProductTable(1);
});

function showAddProduct() {
    countImage = 0;
}

 function loadFile(event) {
     for(var i=0; i<event.target.files.length; i++) {
        var output = 
        "<div class='img-wrap'>" +
            "<span class='close' onclick='deleteImage(this)'>&times;</span>" +
            "<img class='image-preview' id='output' class='image-preview' src='" + URL.createObjectURL(event.target.files[i]) + "'/>" +
        "</div>";
        $(".list-file-preview").append(output);
        filesUpload.push(event.target.files[i]);
     }
  };
  
 function addProduct() {
    var productId = $("input[name*='productIdAdd']").val();
    var productName = $("input[name*='productNameAdd']").val();
    var productType = $("select[name*='productTypeAdd']").val();
    var priceBuy = $("input[name*='priceBuyAdd']").val();
    var priceSell = $("input[name*='priceSellAdd']").val();
    var description = $("textarea[name*='descriptionAdd']").val();
	var typeName = $("#productTypeAdd option:selected").text();
	var guarantee = $("input[name*='guaranteeAdd']").val();
    var avatar = "";
    if(filesUpload.length > 0) {
        var fileTypes = filesUpload[0].name.split('.');
        var type = fileTypes[fileTypes.length - 1];
        avatar = 1 + "." + type;
    }
    var url = "product.php";
    $.ajax({
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                productId: productId, 
                productName: productName,
                productType: productType,
                priceBuy: priceBuy.replace(/\,/g, ''),
                priceSell: priceSell.replace(/\,/g, ''),
                description: description,
                avatar: avatar,
                type: 'addProduct',
				typeName: typeName,
				guarantee : guarantee
            },
            success: function(data){ 
                uploadImage(productId);
                $('#addProduct').modal('toggle');
				resetAddProduct();
                showNotificationHeader("Tạo sản phẩm thành công");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
 }
 
 function resetAddProduct() {
    var productId = $("input[name*='productIdAdd']").val("");
    var productName = $("input[name*='productNameAdd']").val("");
    var productType = $("select[name*='productTypeAdd']").val("");
    var priceBuy = $("input[name*='priceBuyAdd']").val("");
    var priceSell = $("input[name*='priceSellAdd']").val("");
    var description = $("textarea[name*='descriptionAdd']").val("");
	$('.list-file-preview').empty();
	filesUpload = [];
	$("input[id*='files']").val("");
 }
 
 function uploadImage(productId) {
    var countFile = filesUpload.length;
    var url = "../upload.php";
    var maxFileName = $("#maxFileName").val();
    if(maxFileName == undefined || maxFileName == '')
    	maxFileName = 0;
    for(var i=parseInt(countImage); i<countFile; i++){
        try{
            var fileTypes = filesUpload[i].name.split('.');
            var type = fileTypes[fileTypes.length - 1];
            var fileName = (parseInt(maxFileName) + i - parseInt(countImage) + 1) + "." + type;

            var data = new FormData();
            data.append("file", filesUpload[i]);
            data.append("productId", productId);
            data.append("fileName", fileName);
            data.append("type", "product");
            
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
 
 function loadProductTable(page) {
    var url = "product_table.php";
    var productId = $("input[name*='productId']").val();
    var productName = $("input[name*='productName']").val();
    $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                productId: productId, 
                productName: productName,
                page:page
            },
            success: function(data){ 
                $('.content-list').html(data);
                $(".numbers").each(function(c, obj){
                    $(obj).text(addCommas(parseFloat($(obj).text())));
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        });
 }
 
function linkDeleteProduct(e){
    var row = $(e).closest("tr");
    var productName = $(row).find(".productName").text();
    var productId = $(row).find(".productId").text();
    $("#productNameDelete").text(productName);
    $("#productIdDelete").val(productId);
};
    
 function deleteProduct() {
    var productIdDelete = $("#productIdDelete").val();

    var url = "product.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            productId: productIdDelete,
			type: 'deleteProduct'
        },
        success: function(data){ 
            $("tr[id*=" + productIdDelete + "]").remove();
            $('#deleteProduct').modal('toggle');
            showNotificationHeader("Xóa sản phẩm thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    });
 }
 
 function showEditProduct(e) {
    var row = $(e).closest("tr");
    var productIdEdit = $(row).find(".productId").text();
    var url = "product_edit.php?productIdEdit=" + productIdEdit;
    $.ajax({	
        type: 'GET', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(data){ 
            $(".product-modal-edit").html(data);
            countImage = $("#imageTotal").val();
            var listFiles = $("#listFileNameImg").val();
			if(listFiles != '')
				filesUpload = listFiles.split(";");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    });
 }
 
 function editProductAction() {
    var productId = $("span[name*='productIdEdit']").text();
    var productName = $("input[name*='productNameEdit']").val();
    var productType = $("select[name*='productTypeEdit']").val();
    var priceBuy = $("input[name*='priceBuyEdit']").val();
    var priceSell = $("input[name*='priceSellEdit']").val();
    var priceProm = $("input[name*='pricePromEdit']").val();
    var description = $("textarea[name*='descriptionEdit']").val();
    //description = description.replace(/\n/g, '<br />');
    var typeName = $("#productTypeEdit option:selected").text();
    var guarantee = $("input[name*='guaranteeEdit']").val();
    var showWeb = 0;
    var prom = 0;
    if($("input[name*='prom']").is(':checked'))
            prom = 1;
    if($("input[name*='showWebEdit']").is(':checked'))
            showWeb = 1;
    var avatar = $("#avatar").val();
    var maxFileName = $("#maxFileName").val();
    if(maxFileName == "")
        maxFileName = 0;
    if(filesUpload.length > 0) {
        if(countImage == 0 || filesDelete.length == countImage) {
            if(filesUpload.length > countImage) {
                var fileTypes = filesUpload[countImage].name.split('.');
                var type = fileTypes[fileTypes.length - 1];
                avatar = (parseInt(maxFileName) + 1) + "." + type;
            }
        } else {
            for(var i=0; i<filesUpload.length; i++) {
                if (filesDelete.indexOf(filesUpload[i]) == -1){
                    avatar = filesUpload[i];
                    break;
                } 
            }
        }
    }
    var url = "product.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            productId : productId,
            productName : productName,
            productType : productType,
            priceBuy : priceBuy,
            priceSell : priceSell,
            description : description,
            avatar : avatar,
            typeName : typeName,
            showWeb : showWeb,
            guarantee : guarantee,
            prom : prom,
            priceProm : priceProm,
            type : 'editProduct'
        },
        success: function(data){
        	alert(data);
            uploadImage(productId);
            filesUpload = [];
            countImage = 0;
            filesDelete = [];
            $('#editProduct').modal('toggle');
            showNotificationHeader("Chỉnh sửa sản phẩm thành công");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    });
     
 }
 
 function deleteImage(e) {
     var divImage = $(e).closest("div");
     var fileDelete = divImage.find(".img-name-delete").val();
     divImage.remove();
     if(fileDelete != undefined){
        filesDelete.push(fileDelete);
    }
    var indexDelete = -1
    for(var i=countImage; i<filesUpload.length; i++) {
       if(filesUpload[i].name == fileDelete) {
           indexDelete=i;
       } 
    }
    if(indexDelete != -1)
        filesUpload.splice(indexDelete, 1);
 }
 
 function deleteImageAction(productId) {
    var url = "/upload/product/delete";
    for(var i=0; i<filesDelete.length; i++){
        try{
            var fileName = filesDelete[i];

            var data = new FormData();
            data.append("productId", productId);
            data.append("fileName", fileName);
            
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType: 'script',
                cache: false,
                processData: false,
                contentType: false,
                async: false,
                success: function () {
                },
                error: function () {
                },
                complete: function (res) {
                }
            });
        }catch (e) {
                // TODO: handle exception
        }
    }
 }