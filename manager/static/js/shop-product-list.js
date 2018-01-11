$(document).ready(function(){
    $(".btnSearchProduct").click( function(){
        searchProductShop(1);
    });
    
    $(".search-product-add").click( function(){
        var productId = $("input[name*='productIdAdd']").val();
        var productName = $("input[name*='productNameAdd']").val();
        
        var url = "product_list_add.php";
        $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                productId : productId, 
                productName: productName
            },
            success: function(data){ 
                $("div[class*='list-product-add']").html(data);
                $(".numbers").each(function(c, obj){
                    $(obj).text(addCommas(parseFloat($(obj).text())));
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    });
    
    $(".linkDeleteProduct").click( function(){
        var row = $(this).closest("tr");
        var productIdDelete = $(row).find(".productId").text();
        $("#productIdDelete").val(productIdDelete);
    });
    
    $(".deleteProductAction").click( function(){
        var productIdDelete = $("#productIdDelete").val();
        var shopId = $("#shopId").val();
        var url = "shop.php";
        $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                shopId : shopId,
                productId : productIdDelete,
                type : 'deleteProductShop'
            },
            success: function(data){ 
                $("#deleteProduct").modal('toggle');
                showNotificationHeader("Xóa sản phẩm thành công");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        });
        
    });
});

function addProductToShop(e) {
    var row = $(e).closest("tr");
    var productId = $(row).find(".productId").text();
    var count = $(row).find(".count").val();
    var shopId = $("#shopId").val();
    if(count == 0) {
        $(row).find(".count").focus();
        $(row).find(".count").addClass("input-error");
    }
    else {
        var url = "shop.php";
        $.ajax({	
            type: 'POST', 
            url: url, 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                shopId : shopId,
                productId : productId, 
                count: count,
                type: 'addProductToShop'
            },
            success: function(data){ 
                alert('Thêm sản phẩm thành công');
                $(row).find(".count").val("");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
            }
        }); 
    }
}

function showEditCountProduct(e) {
    var row = $(e).closest("tr");
    row.find(".count-product-text").addClass("hide");
    row.find(".count-product-input").removeClass("hide");
    row.find(".btn-edit-product").removeClass("hide");
    row.find(".btn-dlt-product").addClass("hide");
}

function hideEditCountProduct(e) {
    var row = $(e).closest("tr");
    row.find(".count-product-text").removeClass("hide");
    row.find(".count-product-input").addClass("hide");
    row.find(".btn-edit-product").addClass("hide");
    row.find(".btn-dlt-product").removeClass("hide");
}

function editCountProductAction(e) {
    var row = $(e).closest("tr");
    var count = row.find(".count-product-input").val();
    var productId = $(row).find(".productId").text();
    var shopId = $("#shopId").val();
    var url = "shop.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            shopId : shopId,
            productId : productId, 
            count: count,
            type: 'editProductShop'
        },
        success: function(data){ 
            showNotificationHeader("Chỉnh sửa sản phẩm thành công");
            row.find(".count-product-text").text(count);
            hideEditCountProduct(e);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
        }
    }); 
}

function searchProductShop(page) {
    var shopId = $("#shopId").val();
    var productId = $("input[name*='productId']").val();
    var productName = $("input[name*='productName']").val();
    var productType = $("select[name*='productType']").val();
    var productStatus = $("select[name*='productStatus']").val();
    var url = "product_list.php";
    $.ajax({	
        type: 'POST', 
        url: url, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: { 
            shopId: shopId, 
            page: page,
            productId : productId, 
            productName: productName,
            productType: productType,
            productStatus : productStatus
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